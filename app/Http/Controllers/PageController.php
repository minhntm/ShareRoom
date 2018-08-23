<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \File;
use App\Repositories\CityRepository;
use App\Repositories\RoomTypeRepository;
use App\Room;
use Carbon\Carbon;
use GuzzleHttp\Client;

class PageController extends Controller
{
    protected $cityRepo;
    protected $roomTypeRepo;

    public function __construct(CityRepository $cityRepo, RoomTypeRepository $roomTypeRepo)
    {
        $this->cityRepo = $cityRepo;
        $this->roomTypeRepo = $roomTypeRepo;
    }

    public function home()
    {
        return view('pages.home');
    }

    public function search(Request $request)
    {
        $roomTypes = $this->roomTypeRepo->getAttrWithId('type');
        $cities = $this->cityRepo->getAttrWithId('name');
        $numberSelection = $this->getSelection();

        $result = [];
        if (count($request->all()) !== 0){

            $all = Room::all();
            $room_address = [];
            $location_geo = null;

            if ($request->filled('location') && $request->location !== '') {
                // $room_address = Room::all();
                $location_geo = $this->getLatLong($request->location);
                foreach ($all as $room) {
                    if ($this->calDistance($location_geo[0], $location_geo[1], $room->lat, $room->long, 'K') <= 15) {
                        array_push($room_address, $room);
                    }
                }
            } else {
                $room_address = $all;
            }

            $room_price_gteq = $room_address;
            if ($request->filled('price_gteq')) {
                $room_price_gteq = $room_price_gteq->where('price', '>=', $request->price_gteq);
            }

            $room_price_lteq = $room_price_gteq;
            if ($request->filled('price_lteq')) {
                $room_price_lteq = $room_price_lteq->where('price', '<=', $request->price_lteq);
            }

            $room_room_type = $room_price_lteq;
            if ($request->filled('room_type')) {
                $room_room_type = $room_room_type->where('room_type', $request->room_type);
            }

            $room_bed_room = $room_room_type;
            if ($request->filled('bed_room')) {
                $room_bed_room = $room_bed_room->where('bed_room', '>=', $request->bed_room);
            }

            $room_bath_room = $room_bed_room;
            if ($request->filled('bath_room')) {
                $room_bath_room = $room_bath_room->where('bath_room', '>=', $request->bath_room);
            }

            $room_city = $room_bath_room;
            if ($request->filled('city_id')) {
                $room_city = $room_city->where('city_id', $request->city_id);
            }

            $room_tv = $room_city;
            if ($request->filled('is_tv')) {
                $room_tv = $room_tv->where('is_tv', $request->is_tv);
            }
            $room_air = $room_tv;
            if ($request->filled('is_air')) {
                $room_air = $room_air->where('is_air', $request->is_air);
            }
            $room_internet = $room_air;
            if ($request->filled('is_internet')) {
                $room_internet = $room_internet->where('is_internet', $request->is_internet);
            }
            $room_phone = $room_internet;
            if ($request->filled('is_phone')) {
                $room_phone = $room_phone->where('is_phone', $request->is_phone);
            }
            $room_kitchen = $room_phone;
            if ($request->filled('is_kitchen')) {
                $room_kitchen = $room_kitchen->where('is_kitchen', $request->is_kitchen);
            }

            $room_date_range = [];
            if ($request->filled('start_date') && $request->filled('end_date')) {
                $start_date = Carbon::parse($request->start_date);
                $end_date = Carbon::parse($request->end_date);

                foreach ($room_kitchen as $room) {
                    $not_available = $room->notAvailable($start_date, $end_date);

                    if (count($not_available) < 1) {
                        array_push($room_date_range, $room);
                    }
                }

            } else {
                $room_date_range = $room_kitchen;
            }

            $result = $room_date_range;
        }

        return view('pages.search', compact('roomTypes', 'cities', 'numberSelection', 'result', 'location_geo'));
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

    public function getLatLong($address)
    {
        $client = new Client();
        $res = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json', 
            [    
                'query' => ['address' => $address,
                            'key' =>  'AIzaSyCU5Eypr-mIt9pW1nieA8g0yX8lBSpKAvc'
                ]
            ]);
        
        $json = json_decode($res->getBody());
        return [
                $json->results[0]->geometry->location->lat,
                $json->results[0]->geometry->location->lng
        ];
    }
}
