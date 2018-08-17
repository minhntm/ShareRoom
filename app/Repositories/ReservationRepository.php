<?php
namespace App\Repositories;

use App\Repositories\Repository;
use App\Room;
use Carbon\Carbon;

class ReservationRepository extends Repository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Reservation::class;
    }

    public function processReservations($room_id)
    {
        Carbon::setLocale('vi');
        $today = Carbon::now()->toDateString();

        $reservations = $this->model->where('room_id', $room_id)->where('start_date', '>=', $today)->orWhere('end_date', '>=', $today)->get();

        return $reservations;
    }

    public function hasReservationBetween($room_id, $start_date, $end_date)
    {
        $reservations = $this->model->where('room_id', '=', $room_id)->where('start_date', '>', $start_date)->where('end_date', '<', $end_date)->get();

        return $reservations->isEmpty() ? false : true;
    }
}
