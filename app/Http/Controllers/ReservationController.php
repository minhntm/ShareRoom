<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationFormRequest;
use App\Http\Requests\ReservationPreloadFormRequest;
use App\Http\Requests\ReservationPreviewFormRequest;
use App\Reservation;
use App\Room;
use App\Repositories\ReservationRepository;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class ReservationController extends Controller
{
    protected $reservationRepo;

    public function __construct(ReservationRepository $reservationRepo)
    {
        $this->reservationRepo = $reservationRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $reservations = Auth::user()->reservations()->get();
        if($user_id == Auth::user()->id){
            return view('reservations.index', compact('reservations'));
        } else {
            return view('shared.error404');
        }
    }

    public function preload(ReservationPreloadFormRequest $request)
    {
        $room_id = $request->room_id;
        $reservations = $this->reservationRepo->processReservations($room_id);

        return Response::json([
            'reservations' => $reservations
        ], 200);
    }

    public function preview(ReservationPreviewFormRequest $request)
    {
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $room_id = $request->room_id;

        $is_conflict = $this->reservationRepo->hasReservationBetween($room_id, $start_date, $end_date);

        return Response::json([
            'conflict' => $is_conflict
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationFormRequest $request)
    {
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $room_id = $request->room_id;

        $is_conflict = $this->reservationRepo->hasReservationBetween($room_id, $start_date, $end_date);

        if ($is_conflict){
            return redirect()->route('rooms.show', $room_id)->withErrors(trans('app.invalid-range'));
        }

        $data = $request->all();
        $user_id = Auth::user()->id;
        $data['user_id'] = $user_id;
        $reservation = Reservation::create($data);

        return redirect()->route('users.reservation.index', $user_id)->with('status', trans('app.book-success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);
        $reservation->delete();
        return redirect()->route('users.reservation.index', $user_id)->with('status', trans('app.delete-reservation-done'));
    }
}
