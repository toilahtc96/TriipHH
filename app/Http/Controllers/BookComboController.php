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
use App\Models\ComboTrip;

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
            ->leftJoin('cars', 'cars.id', '=', 'book_combos.car_id')->sortable(['created_at' => 'desc'])->paginate(5);
            // dd($bookcombos);
        return view('admin/bookcombo/list-bookcombo')->with('bookcombos', $bookcombos)
        ->with('bookstatuses', $bookstatuses)->with('table_name', 'book_combos')->with('url_link','bookcombos');
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

        $hotels = $this->getListHotelForCBB();
        $bookcombo = BookCombo::where('id', $id)->firstOrFail();

        $hotel_id_new = null;
        $rooms_new = null;

        if ($bookcombo->room_id) {
            $hotel_id_new = RoomHotel::select('hotel_id')->where('id', $bookcombo->room_id)->firstOrFail();
            if ($hotel_id_new->hotel_id) {
                $rooms_new =  $this->getListRoomByHotelIdForCBB($hotel_id_new->hotel_id);
            }
        }

        $combotrip = ComboTrip::where('id', $bookcombo->combo_id)->firstOrFail();

        $locationPassing = $this->getListLocationByCarForCBB($combotrip->car_id);

        $car = Car::find($combotrip->car_id);

        $rooms = $this->getListRoomByHotelIdForCBB($combotrip->hotel_id);
        $roomnews = $this->getListRoomByHotelIdForCBB($bookcombo->hotel_id);

        return view('admin/bookcombo/edit-bookcombo')->with('bookcombo', $bookcombo)->with('locations', $locations)->with('cars', $cars)
            ->with('hotels', $hotels)->with('rooms', $rooms)->with('combotypes', $combotypes)->with('bookstatues', $bookstatues)->with('combotrips', $combotrips)
            ->with('combotrip', $combotrip)->with('roomnews', $roomnews)->with('locationPassing', $locationPassing)->with('car', $car)
            ->with('hotel_id_new', $hotel_id_new == null ? 0 : $hotel_id_new->hotel_id)
            ->with('rooms_new', $rooms_new == null ? ['0' => 'Chọn hạng phòng'] : $rooms_new)
            ->with('url_link','bookcombos');
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

        $validatedData = $request->validate([
            'fullName' => 'required|max:255',
            'msisdn'  => 'required|max:20',
        ]);

        $bookCombo  = BookCombo::findOrFail($id);

        $bookCombo->fullname = $request->fullName;
        $bookCombo->msisdn  = $request->msisdn;
        $bookCombo->fb_link = $request->fb_link;
        // $bookCombo->hotel_id = $request->hotel_id;
        $bookCombo->room_id = $request->room_id;
        $bookCombo->combo_id = $request->combo_id;
        $bookCombo->combo_type_id = $request->combo_type_id;
        $bookCombo->room_code = $request->room_code;
        if (isset($request->checkin_date) &&  $request->checkin_date != "") {
            $bookCombo->checkin_date = $request->checkin_date;
        }
        if (isset($request->checkin_time) &&  $request->checkin_time != "") {
            $bookCombo->checkin_time = $request->checkin_time;
        }
        if (isset($request->checkout_date) &&  $request->checkout_date != "") {
            $bookCombo->checkout_date = $request->checkout_date;
        }
        if (isset($request->checkout_time) &&  $request->checkout_time != "") {
            $bookCombo->checkout_time = $request->checkout_time;
        }
        if (isset($request->price) &&  $request->price != "") {
            $bookCombo->price = $request->price;
        }
        $bookCombo->car_id = $request->car_id;
        $bookCombo->pickup_place_id = $request->pickup_place_id;
        // $bookCombo-> = $request->;
        // $bookCombo-> = $request->;
        // $bookCombo-> = $request->;
        $bookCombo->save();
        return redirect('/admin/bookcombos')->with('url_link','bookcombos');;
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