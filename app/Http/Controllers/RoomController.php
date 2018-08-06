<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Room;
use App\RoomType;
use App\City;
use App\Http\Requests\RoomFormRequest;
use App\Repositories\CityRepository;
use App\Repositories\RoomTypeRepository;

class RoomController extends Controller
{
    protected $cityRepo;
    protected $roomTypeRepo;

    public function __construct(CityRepository $cityRepo, RoomTypeRepository $roomTypeRepo)
    {
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
        $roomTypes = $this->roomTypeRepo->getAttrWithId('type');
        $cities = $this->cityRepo->getAttrWithId('name');
        $numberSelection = $this->getSelection();

        return view('rooms.create', compact('roomTypes', 'cities', 'numberSelection'));
    }

    public function store(RoomFormRequest $request)
    {
        $ownerId = Auth::user()->id;
        $data = $request->all();
        // delete this line when upload image
        unset($data['images']);
        $data['owner_id'] = $ownerId;
        $room = Room::create($data);

        return redirect()->route('rooms.show', $room->id)->with('status', trans('app.room-create-success'));
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        if (isset($room)) {
            return view('rooms.show', compact('room'));
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
}
