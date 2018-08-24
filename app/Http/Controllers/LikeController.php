<?php

namespace App\Http\Controllers;

use App\Events\ReviewUpvoted;
use App\Notification;
use App\Review;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LikeFormRequest;
use Illuminate\Support\Facades\Response;
use App\User;
use App\Like;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LikeFormRequest $request)
    {
        $userId = Auth::user()->id;
        $data = $request->all();
        $data['user_id'] = $userId;
        $like = Like::create($data);

        $noti_data['user_id'] = $like->user_id;
        $noti_data['noti_id'] = $like->id;
        $noti_data['noti_type'] = 1;
        $noti_data['is_read'] = 0;
        $review = Review::findOrFail($like->review_id);
        $like_to_id = $review->user_id;
        if ($noti_data['user_id'] != $like_to_id) {
            $noti = Notification::create($noti_data);
            event(new ReviewUpvoted($noti));
        }

        return Response::json([
            'status' => 'success',
            'user_like' => '1',
            'is_vote' => $request->is_vote,
            'like_id' => $like->id
        ], 200);
    }

    public function show($id)
    {
        $reviewId = $id;
        $user = Auth::user();


        return Response::json([
            'status' => $user->hasLike($reviewId)
        ], 200);
    }

    public function update(LikeFormRequest $request, $like_id)
    {
        $userId = Auth::user()->id;
        $data = $request->all();
        $data['user_id'] = $userId;
        $like = Like::findOrFail($like_id);
        $like->update($data);

        return Response::json([
            'status' => 'success',
            'user_like' => '1',
            'is_vote' => $request->is_vote,
            'like_id' => $like->id
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($like_id)
    {
        $like = Like::findOrFail($like_id);
        $like->delete();

        return Response::json([
            'status' => 'success',
            'user_like' => '0',
            'is_vote' => '-1',
            'like_id' => '-1'
        ], 200);
    }
}
