<?php

namespace App\Http\Controllers;

use App\Models\ComboTrip;
use App\Models\Hotel;
use App\Models\RoomHotel;
use App\Models\Car;
use Illuminate\Http\Request;

class ComboTripClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locations = $this->getListLocationForCBB();
        $hotels_id = ComboTrip::select('hotel_id')->where('status', 1)->distinct('hotel_id')->sortable()->get();
        $arr_hotel_id  = [];
        
        foreach ($hotels_id as $key => $value) {
            array_push($arr_hotel_id, $value->hotel_id);
        }
        $hotels = Hotel::whereIn('hotels.id', $arr_hotel_id)->where('hotels.status', 1)
            ->leftJoin('combo_trips',  'hotels.id', '=','combo_trips.hotel_id')->distinct('combo_trip_name','hotel_id')
            ->sortable()->paginate(6);

        foreach ($hotels as $key => $value) {
            $combotrip_min_price = ComboTrip::select('combo_trips.price')->MIN('combo_trips.price')
            ->where('combo_trips.status', 1)->Where('hotel_id', $value->id)->first();
            if ($combotrip_min_price != null) {
                $value->min_price = $combotrip_min_price->price;
            }else{
                $value->min_price = $value->price;
            }
        }
        $combotypes = $this->getListComboTypeForCBB();
        $combotripsNew = ComboTrip::select('hotels.*', 'combo_types.*','combo_trips.*')->where('combo_trips.status', 1)
            ->leftJoin('combo_types',  'combo_trips.combo_type_id', '=', 'combo_types.id')
            ->leftJoin('hotels',  'combo_trips.hotel_id', '=', 'hotels.id')
            ->sortable(['created_at' => 'desc'])->get();
        foreach ($combotripsNew as $key => $combo) {
            # code...
            // dd($combo);
            $cars = Car::whereIn('id', explode(",", $combo->car_id))->get();
            $combo->cars =  $this->buildListCars($cars);
        }
        return view('client.combotrip.combotrip')->with('hotels', $hotels)
            ->with('locations', $locations)->with('combotripsNew', $combotripsNew)->with('combotypes', $combotypes);
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
        $locations = $this->getListLocationForCBB();
        $combotrips = ComboTrip::select('combo_trips.*', 'combo_types.*')->where('hotel_id', $id)->where('combo_trips.status', 1)
            ->leftJoin('combo_types',  'combo_trips.combo_type_id', '=', 'combo_types.id')
            ->sortable()->paginate(12);
        foreach ($combotrips as $key => $combo) {
            # code...
            // dd($combo);
            $cars = Car::whereIn('id', explode(",", $combo->car_id))->get();
            $combo->cars =  $this->buildListCars($cars);
        }
        $hotel = Hotel::where('status', 1)->where('id', $id)->first();
        $galleryHotel = [];

        $gallery = [];
        $rooms = null;
        if ($hotel) {
            $rooms = RoomHotel::where('status', 1)->where('hotel_id', $hotel->id)->get();
            array_push($galleryHotel,  $hotel->main_image);
            $imgHotel = explode(',', $hotel->list_image);
            foreach ($imgHotel as $key => $value) {
                if ($value != "") {
                    array_push($galleryHotel,  $value);
                }
            }
            foreach ($rooms as $key => $value) {
                # code...
                $imgRoom = explode(',', $value->list_image);
                array_push($gallery, $value->main_image);
                foreach ($imgRoom as $key2 => $value2) {
                    # code...
                    if ($value2 != "") {
                        array_push($gallery,  $value2);
                    }
                }
            }
        }

        $combotypes = $this->getListComboTypeForCBB();

        return view('client.combotrip.list-combo')->with('hotel', $hotel)->with('rooms', $rooms)
            ->with('gallery', $gallery)->with('galleryHotel', $galleryHotel)->with('combotypes', $combotypes)
            ->with('combotrips', $combotrips)->with('locations', $locations);
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
