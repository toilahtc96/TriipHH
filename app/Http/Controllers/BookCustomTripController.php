<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCustomTrip;
use App\Models\Location;
use App\Models\RoomHotel;
use App\Models\Car;
use App\Models\ComboType;
use App\Models\Hotel;
use App\Models\BookStatus;


class BookCustomTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookstatuses = $this->getListBookStatusForCBB();
        $bookcustomtrips = BookCustomTrip::select('book_custom_trips.*'
        , 'locations.location_name', 'cars.own_car', 'room_hotels.level',
         'combo_types.combo_type_name','book_statuses.status')
            ->leftJoin('locations', 'locations.id', '=', 'book_custom_trips.pickup_place_id')
            ->leftJoin('cars', 'cars.id', '=', 'book_custom_trips.car_id')
            ->leftJoin('room_hotels', 'room_hotels.id', '=', 'book_custom_trips.room_id')
            ->leftJoin('combo_types', 'combo_types.id', '=', 'book_custom_trips.combo_type_id')
            ->leftJoin('book_statuses', 'book_statuses.id', '=', 'book_custom_trips.book_status_id')
            ->orderBy('updated_at', 'desc')->paginate(5);

        return view('admin/bookcustomtrip/list-bookcustomtrip')->with('bookcustomtrips', $bookcustomtrips)->with('bookstatuses',$bookstatuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

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
