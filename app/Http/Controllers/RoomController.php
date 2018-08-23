<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Room;
use App\RoomType;
use App\City;
use App\Distance;
use App\Http\Requests\RoomFormRequest;
use App\Repositories\CityRepository;
use App\Repositories\RoomTypeRepository;
use App\Http\Requests\ImageFormRequest;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use App\Photo;

class RoomController extends Controller
{
    protected $cityRepo;
    protected $roomTypeRepo;

    public function __construct(CityRepository $cityRepo, RoomTypeRepository $roomTypeRepo)
    {
        $this->photosPath = public_path('/images');
        $this->cityRepo = $cityRepo;
        $this->roomTypeRepo = $roomTypeRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Auth::user()->rooms()->get();

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image.upload');
    }

    public function store(RoomFormRequest $request)
    {
        $ownerId = Auth::user()->id;
        $data = $request->all();
        $imagesId = json_decode(json_decode($data['images_id'], true));
        unset($data['images_id']);
        $data['owner_id'] = $ownerId;
        $newRoom = Room::create($data);
        foreach ($imagesId as $imageId) {
            $photo = Photo::findOrFail($imageId);
            $photo->room()->associate($newRoom);
            $photo->save();
        }

        $rooms = Room::all();
        foreach ($rooms as $room){
            if ($room->id !== $newRoom->id){
                $distance = $this->calDistance($newRoom->lat, $newRoom->long, $room->lat, $room->long, "K");
                Distance::create([
                    'room1_id' => $newRoom->id,
                    'room2_id' => $room->id,
                    'distance' => $distance,
                ]);
                Distance::create([
                    'room1_id' => $room->id,
                    'room2_id' => $newRoom->id,
                    'distance' => $distance,
                ]);
            }
        }

        return redirect()->route('rooms.show', $newRoom->id)->with('status', trans('app.room-create-success'));
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        if (isset($room)) {
            $photo = $room->photos()->first();
            $reviews = $room->reviews()->get();
            $distances = $room->nearby(6, 5);
            $nearby = [];
            foreach ($distances as $distance){
                array_push($nearby, Room::findOrFail($distance->room2_id));
            }
        }

        if (isset($room)) {
            return view('rooms.show', compact('room', 'photo', 'reviews', 'nearby'));
        } else {
            return view('shared.error404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomTypes = $this->roomTypeRepo->getAttrWithId('type');
        $cities = $this->cityRepo->getAttrWithId('name');
        $numberSelection = $this->getSelection();

        $room = Room::findOrFail($id);

        if (isset($room)) {
            return view('rooms.edit', compact('room', 'roomTypes', 'cities', 'numberSelection'));
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
    public function update(RoomFormRequest $request, $id)
    {
        $data = $request->all();
        // delete this line when upload image
        unset($data['images']);
        // dd($data);
        $room = Room::findOrFail($id);
        $room->update($data);

        return redirect()->route('rooms.edit', $id)->with('status', trans('app.room-update-success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('rooms.index')->with('status', trans('Your room has been deleted!'));
    }

    protected function getSelection()
    {
        $max = 6;
        $selections = [];
        for ($i = 0; $i < $max; $i++) {
            $selections[$i] = $i;
        }

        return $selections;
    }

    public function uploadImage(Request $request)
    {
        $next = $request->input('next') == '1' ? true : false;
        
        if ($next) {
            $id = json_encode($request->input('images_id'));
            $roomTypes = $this->roomTypeRepo->getAttrWithId('type');
            $cities = $this->cityRepo->getAttrWithId('name');
            $numberSelection = $this->getSelection();

            return view('rooms.create', compact('roomTypes', 'cities', 'numberSelection', 'id'));
        }

        $imagesId = [];
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
 
            $savedPhoto = Photo::create(['filename' => $saveName, 'resized_name' => $resizeName, 'original_name' => basename($photo->getClientOriginalName())]);
            $imagesId[] = $savedPhoto->id;
        }

        return Response::json([
            'message' => trans('app.save-image-success'),
            'images_id' => $imagesId,
        ], 200);
    }

    public function destroyImage(Request $request)
    {
        $fileName = $request->id;
        $uploadedImage = Photo::where('original_name', basename($fileName))->first();
        $id = $uploadedImage->id;
 
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
 
        return Response::json([
            'message' => trans('app.delete-image-success'),
            'image_id' => $id,
        ], 200);
    }

    public function testShowRoom()
    {
        return view('rooms.test-show-room');
    }

    protected function calDistance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
}
