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


        $hotels = Hotel::select('hotels.*', 'location_name')
            ->leftJoin('locations', 'locations.id', '=', 'hotels.address_id')
            ->orderBy('hotel_name', 'desc')->paginate(5);
        // $hotels->setBaseUrl('custom/url');
        foreach ($hotels as $key => $val) {
            $val->service_included = str_replace(";", "\n", $val->service_included);
            $val->service_included = str_replace(".", ". ", $val->service_included);
            $val->place_around = $this->getListLocationName($val->place_around);
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
        $locations = $this->getListLocationForCBB();
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
        $hotel =  new Hotel;
        $hotel->hotel_name = $request->hotel_name;
        $hotel->service_included = $request->service_included;
        $hotel->level = $request->level;
        $hotel->info = $request->info;
        $hotel->main_image = $request->main_image;
        $hotel->general_rule = $request->general_rule;
        $hotel->rate = $request->rate;
        $hotel->main_info = $request->main_info;
        $hotel->list_image = $request->list_image == null ? "" : $request->list_image;
        $hotel->full_info = $request->full_info == null ? "" : $request->full_info;
        $hotel->place_around = "";
        
        if ($request->place_around) {
            foreach ($request->place_around as $place) {
                $hotel->place_around .= $place . ",";
            }
            $hotel->place_around = substr($hotel->place_around, 0, strlen($hotel->place_around) - 1);
        }

        $hotel->status = $request->status == null ? 1 : $request->status;
        $hotel->address_id = $request->address_id == null ? 1 : $request->status;
        $uploadImage = $this->fileUpload($request, "hotels");

        if ($uploadImage->getSession()->get('imageName') !== null) {
            $hotel->main_image = $uploadImage->getSession()->get('imageName');
        }

        $uploadMultiImage = $this->fileMultiUpload($request, "hotels");
        if ($uploadImage->getSession()->get('listImageName') !== null) {
            $hotel->list_image = $uploadMultiImage->getSession()->get('listImageName');
        }




        $hotel->save();
        // Session::flash('success', 'The hotel post was successfully saved!');
        return redirect()->route('hotels.view');
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
        $locationdb = Location::get();
        $locations  = [];
        foreach ($locationdb as $key => $val) {
            $locations[$val->id] = $val->location_name;
        }
        $hotel->image_root_folder = "hotels";
        $hotel->place_around =  explode(",", $hotel->place_around);
        return view('admin/hotel/edit-hotel')->with('hotel', $hotel)
            ->with('locations', $locations)->with('error_code', 5);
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
        $hotel->hotel_name = $request->hotel_name;
        $hotel->service_included = $request->service_included;
        $hotel->level = $request->level;
        $hotel->info = $request->info;
        $hotel->main_image = $request->main_image_hidden == null ? "" : $request->main_image_hidden;
        $hotel->general_rule = $request->general_rule;
        $hotel->rate = $request->rate;
        $hotel->main_info = $request->main_info;

        $hotel->list_image = $request->list_image_old == null ? "" : $request->list_image_old;
        $hotel->full_info = $request->full_info == null ? "" : $request->full_info;
        $hotel->place_around = $request->place_around == null ? [] : $request->place_around;
        $hotel->status = $request->status == null ? 1 : $request->status;
        $hotel->address_id = $request->address_id == null ? 1 : $request->status;
        if (!isset($request->main_image_hidden)) {
            $uploadImage = $this->fileUpload($request, "hotels");
            if ($uploadImage->getSession()->get('imageName') !== null) {
                $hotel->main_image .= $uploadImage->getSession()->get('imageName');
            }
        }
        if ($request->hasFile('list_image')) {
            $uploadMultiImage = $this->fileMultiUpload($request, "hotels");
            if ($uploadMultiImage->getSession()->get('listImageName') !== null) {
                $hotel->list_image .= ',' . $uploadMultiImage->getSession()->get('listImageName');
            }
        }
        $place = "";
        foreach ($hotel->place_around  as  $val) {
            $place  .=  ',' .   $val;
        }
        $hotel->place_around = (substr($place, 1, strlen($place)));
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
