<?php

namespace App\Events;

use App\Notification;
use App\Review;
use App\Room;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserReviewed implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $review;
    public $review_owner_id;
    public $review_owner_name;
    public $review_to_id;
    public $review_room_id;
    public $review_content;
    public $review_time;
    public $event_type_message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Notification $noti)
    {
        $this->review = Review::findOrFail($noti->noti_id);
        $this->review_content = $this->review->comment;
        $this->review_owner_id = $noti->user_id;
        $this->review_owner_name = User::findOrFail($noti->user_id)->name;
        $this->review_to_id = Room::findOrFail($this->review->room_id)->owner_id;
        $this->review_room_id = $this->review->room_id;
        $this->event_type_message = $this->review_owner_name . ' commented your room';
        $this->review_time = $noti->created_at->format('H:i:s d-m-Y');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['user-reviewed'];
    }


}
