<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Hotel;
use App\Models\Location;
use App\Models\ComboType;
use App\Models\ComboTrip;
use App\Models\RoomHotel;
use Illuminate\Support\Facades\Input;

class ComboTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $combotrips = ComboTrip::select(
            'combo_trips.*',
            'own_car',
            'hotel_name',
            'room_hotels.level',
            'combo_types.combo_type_name'
            
        )
            ->leftJoin('cars', 'cars.id', '=', 'combo_trips.car_id')
            ->leftJoin('hotels', 'hotels.id', '=', 'combo_trips.hotel_id')
            ->leftJoin('room_hotels', 'room_hotels.id', '=', 'combo_trips.room_id')
            ->leftJoin('combo_types', 'combo_types.id', '=', 'combo_trips.combo_type_id')
            ->orderBy('updated_at', 'desc')->paginate(5);
            
        // $hotels->setBaseUrl('custom/url');
        foreach ($combotrips as $key => $val) {
            $val->service_included = str_replace(";", "\n", $val->service_included);
            $val->service_included = str_replace(".", ". ", $val->service_included);
        }
        return view('admin/combotrip/list-combotrip')->with('combotrips', $combotrips);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $hotels = $this->getListHotelForCBB();
        $cars = $this->getListCarForCBB();
        $combotypes = $this->getListComboTypeForCBB();

        $keyHotel = key($hotels);
        if ($keyHotel) {
            $rooms = $this->getListRoomByHotelIdForCBB($keyHotel);
        }

        return view('admin/combotrip/new-combotrip')->with("hotels", $hotels)
            ->with("cars", $cars)->with("combotypes", $combotypes)->with('rooms', $rooms);
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

        // validate the data
        $this->validate($request, array(
            'hotel_id' => 'required|max:255',
            'room_id'  => 'required',
            'car_id' => 'required',
            'combo_type_id' => 'required',
            'price' => 'required',
            'start_time' => 'required',
            'arrival_time' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ));

        // store in the database
        $combotrip =  new ComboTrip;
        $combotrip->hotel_id = $request->hotel_id;
        $combotrip->room_id = $request->room_id;
        $combotrip->car_id = $request->car_id;
        $combotrip->combo_type_id = $request->combo_type_id;
        $combotrip->service_included = $request->service_included;
        $combotrip->price = $request->price;

        $combotrip->start_time = $request->start_time;
        $combotrip->arrival_time = $request->arrival_time;
        $combotrip->end_date = $request->end_date;
        $combotrip->start_date = $request->start_date;

        $combotrip->status = $request->status == null ? 0 : $request->status;
        $combotrip->list_image = $request->list_image == null ? "" : $request->list_image;
        $uploadMultiImage = $this->fileMultiUpload($request, "combotrips");
        if ($uploadMultiImage->getSession()->get('listImageName') !== null) {
            $combotrip->list_image = $uploadMultiImage->getSession()->get('listImageName');
        }
        // dd($combotrip);

        $combotrip->save();
        // Session::flash('success', 'The hotel post was successfully saved!');
        return redirect()->route('combotrips.view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //+


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotels = $this->getListHotelForCBB();
        $cars = $this->getListCarForCBB();
        $combotypes = $this->getListComboTypeForCBB();

        $keyHotel = key($hotels);
        if ($keyHotel) {
            $rooms = $this->getListRoomByHotelIdForCBB($keyHotel);
        }
        $combotrip = ComboTrip::where('id', $id)->findOrFail($id);
        $combotrip->image_root_folder = "combotrips";

        return view('admin/combotrip/edit-combotrip')->with("hotels", $hotels)->with("combotrip", $combotrip)
            ->with("cars", $cars)->with("combotypes", $combotypes)->with('rooms', $rooms);
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

        $this->validate($request, array(
            'hotel_id' => 'required|max:255',
            'room_id'  => 'required',
            'car_id' => 'required',
            'combo_type_id' => 'required',
            'price' => 'required',
            'start_time' => 'required',
            'arrival_time' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ));

        // // process the login
        // if ($validator->fails()) {
        //     return Redirect::back()->withErrors($validator)
        //         ->withInput();
        // }
        $combotrip = ComboTrip::find($id);

        $combotrip->service_included = $request->service_included;
        $combotrip->hotel_id = $request->hotel_id;
        $combotrip->room_id = $request->room_id;
        $combotrip->car_id = $request->car_id;
        $combotrip->combo_type_id = $request->combo_type_id;
        $combotrip->price = $request->price;

        $combotrip->start_time = $request->start_time;
        $combotrip->arrival_time = $request->arrival_time;
        $combotrip->end_date = $request->end_date;
        $combotrip->start_date = $request->start_date;
        $combotrip->list_image = $request->list_image_old == null ? "" : $request->list_image_old;
        $combotrip->status = $request->status == null ? 1 : $request->status;
        if ($request->hasFile('list_image')) {
            $uploadMultiImage = $this->fileMultiUpload($request, "combotrips");
            if ($uploadMultiImage->getSession()->get('listImageName') !== null) {
                $combotrip->list_image .= ',' . $uploadMultiImage->getSession()->get('listImageName');
            }
        }
        $combotrip->save();

        $request->session()->flash('status', 'Update ComboTrip Successful!');
        $request->session()->flash('modal_title', 'Successful!');
        $request->session()->flash('modal_content', 'Update ComboTrip Successful!');
        return redirect('/admin/combotrips');
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
