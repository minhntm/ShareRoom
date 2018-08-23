<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditProfileFormRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use App\Avatar;

class UserController extends Controller
{
    public function __construct()
    {
        $this->photosPath = public_path('/images');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        if (isset($user) && ($user==Auth::user())) {
            return view('users.edit', compact('user'));
        } else {
            return view('shared.error404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditProfileFormRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $password = $request->get('password');
        if ($password != '') {
            $user->password = Hash::make($password);
        }
        $user->save();
        toastr()->success(trans('app.user-update-success'), 'Status');

        return Redirect::route('users.edit', $user->id)->with('status', trans('app.user-update-success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function avatar()
    {
        $user = Auth::user();

        return view('users.avatar', compact('user'));
    }

    public function uploadAvatar(Request $request)
    {
        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }
 
        if (!is_dir($this->photosPath)) {
            mkdir($this->photosPath, 0777);
        }
 
        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = sha1(date('YmdHis') . str_random(30));
            $saveName = $name . '.' . $photo->getClientOriginalExtension();
            $resizeName = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
 
            Image::make($photo)
                ->resize(250, null, function ($constraints) {
                    $constraints->aspectRatio();
                })
                ->save($this->photosPath . '/' . $resizeName);
 
            $photo->move($this->photosPath, $saveName);
 
            $savedPhoto = Avatar::create(['filename' => $saveName, 'resized_name' => $resizeName, 'original_name' => basename($photo->getClientOriginalName())]);
            $user = Auth::user();
            if ($user->avatar()->exists()) {
                $this->deletePhoto($user->avatar()->first());
                $user->avatar()->delete();
            }
            $user->avatar()->save($savedPhoto);
        }

        return Response::json([
            'message' => trans('app.save-image-success'),
        ], 200);
    }

    public function deleteAvatar(Request $request)
    {
        $fileName = $request->id;
        $uploadedImage = Avatar::where('original_name', basename($fileName))->first();

        if ($uploadedImage) {
            $this->deletePhoto($uploadedImage);
            if (!empty($uploadedImage)) {
                $user = Auth::user();
                $user->avatar()->delete();
                //$uploadedImage->delete();
            }
        }
 
        return Response::json([
            'message' => trans('app.delete-image-success'),
        ], 200);
    }

    public function deletePhoto(Avatar $uploadedImage)
    {
        if (empty($uploadedImage)) {
            return Response::json(['message' => trans('app.file-not-exist')], 400);
        }
 
        $filePath = $this->photosPath . '/' . $uploadedImage->filename;
        $resizedFile = $this->photosPath . '/' . $uploadedImage->resized_name;
 
        if (file_exists($filePath)) {
            unlink($filePath);
        }
 
        if (file_exists($resizedFile)) {
            unlink($resizedFile);
        }
    }
}
