<?php

namespace App\Events;

use App\Like;
use App\Notification;
use App\Review;
use App\Room;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReviewUpvoted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $like;
    public $like_review_id;
    public $like_review_content;
    public $like_owner_id;
    public $like_to_id;
    public $like_owner_name;
    public $like_time;
    public $like_room_id;
    public $event_type_message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Notification $noti)
    {
        $this->like = Like::findOrFail($noti->noti_id);
        $this->like_review_id = $this->like->review_id;
        $review = Review::findOrFail($this->like->review_id);
        $this->like_to_id = $review->user_id;
        $this->like_room_id = $review->room_id;
        $this->like_review_content = Review::findOrFail($this->like->review_id)->comment;

        $this->like_owner_id = $noti->user_id;
        $this->like_owner_name = User::findOrFail($noti->user_id)->name;
        $this->like_time = $noti->created_at->format('H:i:s d-m-Y');

        if ($this->like->is_vote == 1) {
            $this->event_type_message = $this->like_owner_name . ' upvoted your review';
        } else {
            $this->event_type_message = $this->like_owner_name . ' downvoted your review';
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['review-upvoted'];
    }
}
