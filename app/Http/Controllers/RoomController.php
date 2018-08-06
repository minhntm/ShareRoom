<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Room;
use App\RoomType;
use App\City;
use App\Http\Requests\RoomFormRequest;

class RoomController extends Controller
{
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
        $roomTypeObjects = RoomType::get(['id', 'type'])->toArray();
        $roomTypes = array();
        foreach ($roomTypeObjects as $roomTypeObject) {
            $roomTypes[$roomTypeObject['id']] = $roomTypeObject['type'];
        }

        $cityObjects = City::get(['id', 'name'])->toArray();
        $cities = array();
        foreach ($cityObjects as $cityObject) {
            $cities[$cityObject['id']] = $cityObject['name'];
        }

        return view('rooms.create', compact('roomTypes', 'cities'));
    }

    public function store(RoomFormRequest $request)
    {
        $owner_id = Auth::user()->id;
        $data = $request->all();
        // delete this line when upload image
        unset($data['images']);
        $data['owner_id'] = $owner_id;
        $room = Room::create($data);
        return redirect()->route('rooms.show', $room->id)->with('status', trans('app.room-create-success'));
    }

    public function show($id)
    {
        $room = Room::whereId($id)->first();
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
        $roomTypeObjects = RoomType::get(['id', 'type'])->toArray();
        $roomTypes = array();
        foreach ($roomTypeObjects as $roomTypeObject) {
            $roomTypes[$roomTypeObject['id']] = $roomTypeObject['type'];
        }

        $cityObjects = City::get(['id', 'name'])->toArray();
        $cities = array();
        foreach ($cityObjects as $cityObject) {
            $cities[$cityObject['id']] = $cityObject['name'];
        }

        $room = Room::whereId($id)->first();

        if (isset($room)) {
            return view('rooms.edit', compact('room', 'roomTypes', 'cities'));
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
        $room = Room::whereId($id)->first();
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
        $room = Room::whereId($id)->first();
        $room->delete();

        return redirect()->route('rooms.index')->with('status', trans('Your room has been deleted!'));
    }
}
