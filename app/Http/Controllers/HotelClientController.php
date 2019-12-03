<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hotel;
use App\Models\RoomHotel;

class HotelClientController extends Controller
{
    //
    public function index()
    {
        $hotels = Hotel::select('id', 'hotel_name', 'slugs', 'main_info', 'main_image')->where('status', 1)->sortable()->paginate(6);
        return view('client.hotel.hotel')->with('hotels', $hotels);
    }

    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //+
        $hotel =  Hotel::where('status', 1)->where('id', $id)->firstOrFail();
        if ($hotel) {
            $rooms = RoomHotel::where('status', 1)->where('hotel_id', $hotel->id)->get();
        }

        return view('client.hotel.list-room')->with('hotel', $hotel)->with('rooms', $rooms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
