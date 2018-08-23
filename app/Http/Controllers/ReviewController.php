<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewFormRequest;
use Illuminate\Support\Facades\Response;
use App\Review;
use App\Room;

class ReviewController extends Controller
{
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
    public function store(ReviewFormRequest $request)
    {
        $data = $request->all();
        $user_id = Auth::user()->id;
        $data['user_id'] = $user_id;
        $review = Review::create($data);
        
        return Response::json([
            'message' => 'Added review',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        if (isset($room)) {
            $reviews = $room->reviews()->get();
        }

        return view('reviews.all', compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $room_id = $request->get('room_id');
        $review_id = $request->get('review_id');
        $review = Review::findOrFail($review_id);
        $review->delete();
        
        return Response::json([
            'message' => 'Deleted review',
        ], 200);
    }
}
