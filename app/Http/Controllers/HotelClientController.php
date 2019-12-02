<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hotel;

class HotelClientController extends Controller
{
    //
    public function index()
    {
        $hotels = Hotel::select('hotel_name', 'main_info', 'main_image')->where('status', 1)->sortable()->paginate(6);
        return view('client.hotel.hotel')->with('hotels', $hotels);
    }
}
