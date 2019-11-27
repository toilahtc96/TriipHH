<?php

namespace App\Http\Controllers;

use App\Models\BookCombo;
use Illuminate\Http\Request;
use App\Models\BookCustomTrip;
use App\Models\Location;
use App\Models\RoomHotel;
use App\Models\Car;
use App\Models\ComboType;
use App\Models\Hotel;
use App\Models\BookStatus;

class BookComboController extends Controller
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
        $bookcombos = BookCombo::select(
            'book_combos.*',
            'locations.location_name',
            // 'combo_trips.car_id',
            'cars.own_car',
            'cars.car_type',
            // 'combo_trips.room_id',
            'combo_types.combo_type_name',
            'book_statuses.status'
        )
            ->leftJoin('locations', 'locations.id', '=', 'book_combos.pickup_place_id')
            ->leftJoin('combo_types', 'combo_types.id', '=', 'book_combos.combo_type_id')
            ->leftJoin('combo_trips', 'combo_trips.id', '=', 'book_combos.combo_id')
            ->leftJoin('book_statuses', 'book_statuses.id', '=', 'book_combos.book_status_id')
            ->leftJoin('cars', 'cars.id', '=', 'combo_trips.car_id')
            ->orderBy('updated_at', 'desc')->paginate(5);
        return view('admin/bookcombo/list-bookcombo')->with('bookcombos', $bookcombos)->with('bookstatuses', $bookstatuses);
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
        $locations = $this->getListLocationForCBB();
        $cars = $this->getListCarForCBB();
        $bookstatues = $this->getListBookStatusForCBB();
        $combotypes = $this->getListComboTypeForCBB();
        $combotrips = $this->getListComboTripForCBB();
        $rooms = $this->getListRoomdForCBB();
        $hotels = $this->getListHotelForCBB();
        $bookcombo = BookCombo::where('id', $id)->firstOrFail();
        return view('admin/bookcombo/edit-bookcombo')->with('bookcombo', $bookcombo)->with('locations', $locations)->with('cars', $cars)
        ->with('hotels', $hotels)->with('rooms', $rooms)->with('combotypes',$combotypes)->with('bookstatues',$bookstatues)->with('combotrips',$combotrips);
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
       
        $bookCombo  = BookCombo::findOrFail($id);

        $input = $request->all();
    
        $bookCombo->fill($input)->save();
        return redirect('/admin/bookcombos');
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
