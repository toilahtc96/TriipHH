<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Hotel;
use App\Models\Location;
use Illuminate\Support\Facades\Input;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cars = Car::paginate(5);
        $locationMapping = [];
        foreach ($cars as $key => $val) {
            // dd($val->id);
            $starting_location_id = Location::select('id', 'location_name')->where('id', $val->starting_location_id)->first();
            $locationMapping[$val->id]['starting_location_id'] = $starting_location_id;

            $destination_id = Location::select('id', 'location_name')->where('id', $val->destination_id)->first();
            $locationMapping[$val->id]['destination_id'] = $destination_id;

            if ($val->start_pickup_location != null) {
                $locationMapping =  $this->createLocationList($locationMapping, $val->id, "start_pickup_location", $val->start_pickup_location);
            }

            if ($val->destination_pickup_location != null) {

                $locationMapping =  $this->createLocationList($locationMapping, $val->id, "destination_pickup", $val->destination_pickup_location);
            }

            if ($val->places_passing != null) {
                $locationMapping =  $this->createLocationList($locationMapping, $val->id, "places_passing", $val->places_passing);
            }
        }
        dd($locationMapping);


        $hotels = Hotel::select('hotels.*', 'location_name')
            ->leftJoin('locations', 'locations.id', '=', 'hotels.address_id')
            ->orderBy('hotel_name', 'desc')->paginate(5);
        // dd($hotels);
        // $hotels->setBaseUrl('custom/url');
        foreach ($hotels as $key => $val) {
            $val->service_included = str_replace(";", `<br/>`, $val->service_included);
            $val->service_included = str_replace(".", ". ", $val->service_included);
            $val->place_around = str_replace(";",  `<br/>`, $val->place_around);
            $val->place_around = str_replace(".", ". ", $val->place_around);
        }
        return view('admin/hotel/list-hotel')->with('hotels', $hotels);
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $locationdb = Location::get();
        $locations  = [];
        foreach ($locationdb as $key => $val) {
            $locations[$val->id] = $val->location_name;
        }

        // ['L' => 'Núi BV', 'S' => 'Đảo XC']
        return view('admin/hotel/new-hotel')->with('locations', $locations);
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
            'hotel_name' => 'required|max:255',
            'service_included'  => 'required'
        ));
        // store in the database
        $hotel = new Hotel;
        $hotel->hotel_name = $request->hotel_name;
        $hotel->service_included = $request->service_included;
        $hotel->level = $request->level;
        $hotel->info = $request->info;
        $hotel->main_image = $request->main_image;
        $hotel->list_image = $request->list_image == null ? "" : $request->list_image;
        $hotel->main_info = $request->main_info;
        $hotel->full_info = $request->full_info == null ? "" : $request->full_info;
        $hotel->place_around = $request->place_around == null ? 1 : $request->full_info;
        $hotel->general_rule = $request->general_rule;
        $hotel->rate = $request->rate;
        $hotel->status = $request->status == null ? 1 : $request->status;
        $hotel->address_id = $request->address_id == null ? 1 : $request->status;
        $uploadImage = $this->fileUpload($request);
        if ($uploadImage->getSession()->get('imageName') !== null) {
            $hotel->main_image = $uploadImage->getSession()->get('imageName');
        }


        $hotel->save();
        // Session::flash('success', 'The hotel post was successfully saved!');
        return redirect()->route('admin');
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
        //\
        $hotel =  Hotel::where('id', $id)->findOrFail($id);
        return view('admin/hotel/edit-hotel')->with('hotel', $hotel)->with('error_code', 5);
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
            'hotel_name' => 'required|max:255',
            'service_included'  => 'required'
        ));

        // // process the login
        // if ($validator->fails()) {
        //     return Redirect::back()->withErrors($validator)
        //         ->withInput();
        // }
        $hotel = Hotel::find($id);
        $hotel->hotel_name = Input::get('hotel_name');
        $hotel->save();

        $request->session()->flash('status', 'Update Hotel ' . $hotel->hotel_name . ' Successful!');
        $request->session()->flash('modal_title', 'Successful!');
        $request->session()->flash('modal_content', 'Update Hotel Successful!');
        return redirect('/admin/hotels');
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
