<?php

namespace App\Http\Controllers;

use App\Models\ComboTrip;
use App\Models\Hotel;
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
        $combotrips = ComboTrip::select('combo_trips.*','hotels.hotel_name')->leftJoin('hotels','combo_trips.hotel_id','=','hotels.id')->sortable(['created'=>'desc'])->paginate(6);
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
}
