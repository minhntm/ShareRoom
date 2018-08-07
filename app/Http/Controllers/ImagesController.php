<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageFormRequest;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use App\Photo;

class ImagesController extends Controller
{
    public function __construct()
    {
        $this->photosPath = public_path('/images');
    }

    public function index()
    {
        $photos = Photo::all();
        
        return view('image.show', compact('photos'));
    }

    public function create()
    {
        return view('image.upload');
    }

    public function store(Request $request)
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
 
            Photo::create(['filename' => $saveName, 'resized_name' => $resizeName, 'original_name' => basename($photo->getClientOriginalName())]);
        }

        return Response::json([
            'message' => trans('app.save-image-success'),
        ], 200);
    }

    public function destroy(Request $request)
    {
        $fileName = $request->id;
        $uploadedImage = Photo::where('original_name', basename($fileName))->first();
 
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
 
        if (!empty($uploadedImage)) {
            $uploadedImage->delete();
        }
 
        return Response::json(['message' => trans('app.delete-image-success')], 200);
    }
}
