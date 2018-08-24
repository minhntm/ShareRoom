<?php

namespace App\Events;

use App\Notification;
use App\Reservation;
use App\Room;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RoomBooked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reservation;
    public $reservation_owner_id;
    public $reservation_owner_name;
    public $reservation_to_id;
    public $reservation_room_id;
    public $reservation_room_name;
    public $reservation_time;
    public $event_type_message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Notification $noti)
    {
        $this->reservation = Reservation::findOrFail($noti->noti_id);
        $this->reservation_owner_id = $noti->user_id;
        $this->reservation_owner_name = User::findOrFail($noti->user_id)->name;
        $this->reservation_room_id = $this->reservation->room_id;
        $this->reservation_room_name = Room::findOrFail($this->reservation->room_id)->name;
        $this->reservation_to_id = Room::findOrFail($this->reservation->room_id)->owner_id;
        $this->reservation_time = $this->reservation->created_at->format('H:i:s d-m-Y');
        $this->event_type_message = $this->reservation_owner_name . ' booked your room';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['room-booked'];
    }
}
