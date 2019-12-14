<?php

namespace App\Http\Controllers;

use App\Models\ComboTrip;
use App\Models\Hotel;
use App\Models\RoomHotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $hotels = Hotel::sortable(['updated_at'=>'desc'])->paginate(6);
        foreach ($hotels as $key => $value) {
            # code...
            $room = RoomHotel::MIN('price')->where('room_hotels.status', 1)->where('room_hotels.hotel_id', $value->id)->first();
            if($room){
                $value->price = $room->price;
            }
        }
        $combotrips = ComboTrip::select('combo_trips.*','hotels.hotel_name')
        ->leftJoin('hotels','combo_trips.hotel_id','=','hotels.id')->sortable(['created'=>'desc'])->paginate(6);
        // dd($combotrips);
        return view('client.home')->with('hotels',$hotels)->with('combotrips',$combotrips);
        
    }

    public function contact()
    {
        return view('client.contact.contact')->with('banner','15740870875.jpg');
    }

    public function introduce()
    {
        return view('client.contact.introduce')->with('banner','15740915990.jpg');
    }

    public function bookcustom()
    {
        $hotels = $this->getListHotelActiveForCBB();
        $rooms = ["Loại phòng"];
        $combotypes = $this->getListComboTypeActiveForCBB();
        $cars = $this->getListCarActiveForCBB();
        return view('client.home.bookcustom')->with('cars',$cars)->with('combotypes',$combotypes)
        ->with('hotels',$hotels)->with('rooms',$rooms)->with('banner','15740915990.jpg');
    }

    public function bookcar()
    {
        $cars = $this->getListCarActiveForCBB();
        return view('client.home.bookcar')->with('cars',$cars)->with('banner','15740915990.jpg');
    }

}