<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Location;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $cars = Car::sortable()->paginate(5);
       
        foreach ($cars as $key => $val) {
            

            if ($val->starting_location_id != null) {
                $val->start = $this->getListLocationName($val->starting_location_id);
            }
            if ($val->places_passing != null) {
                $val->places_passing = $this->getListLocationName($val->places_passing);
            }
           
           
            if ($val->destination_id != null) {
                $val->finish = $this->getListLocationName($val->destination_id);
            }
        }
        return view('admin/car/list-car')->with('cars', $cars)->with('table_name','cars');
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
        return view('admin/car/new-car')->with('locations', $locations);
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
            'own_car' => 'required|max:255',
            'msisdn'  => 'required|max:20',
            'count_seat' => 'required',
            'price' => 'required'
        ));
        // store in the database
        $car =  new Car;
        $car->own_car = $request->own_car;
        $car->msisdn = $request->msisdn;
        $car->price = $request->price;
        $car->count_seat = $request->count_seat == null ? 1 : $request->count_seat;
        $car->status = $request->status == null ? 1 : $request->status;
        $car->direction = $request->direction == null ? 1 : $request->direction;
        $car->starting_location_id = $request->starting_location_id == null ? 1 : $request->starting_location_id;
        $car->destination_id =  $request->destination_id;
        $car->license_plates = $request->license_plates == null ? "" : $request->license_plates;
        $car->list_image = $request->list_image == null ? "" : $request->list_image;
        $car->car_type =  $request->car_type;

        if ($request->start_pickup_location) {
            foreach ($request->start_pickup_location as $place) {
                $car->start_pickup_location .= $place . ",";
            }
            $car->start_pickup_location = substr($car->start_pickup_location, 0, strlen($car->start_pickup_location) - 1);
        } else {
            $car->start_pickup_location = "";
        }
        if ($request->destination_pickup_location) {
            foreach ($request->destination_pickup_location as $place) {
                $car->destination_pickup_location .= $place . ",";
            }
            $car->destination_pickup_location = substr($car->destination_pickup_location, 0, strlen($car->destination_pickup_location) - 1);
        } else {
            $car->destination_pickup_location = "";
        }
        if ($request->places_passing) {
            foreach ($request->places_passing as $place) {
                $car->places_passing .= $place . ",";
            }
            $car->places_passing = substr($car->places_passing, 0, strlen($car->places_passing) - 1);
        } else {
            $car->places_passing = "";
        }
        $uploadImage = $this->fileUpload($request, "cars");
        if ($uploadImage->getSession()->get('imageName') !== null) {
            $car->main_image = $uploadImage->getSession()->get('imageName');
        }
        $uploadMultiImage = $this->fileMultiUpload($request, "cars");
        if ($uploadImage->getSession()->get('listImageName') !== null) {
            $car->list_image = $uploadMultiImage->getSession()->get('listImageName');
        }
        $car->save();
        $request->session()->flash('success', 'The car post was successfully saved!');
        return redirect()->route('cars.view');
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
        $car =  Car::where('id', $id)->findOrFail($id);
        $locationdb = Location::get();
        $locations  = [];
        foreach ($locationdb as $key => $val) {
            $locations[$val->id] = $val->location_name;
        }
        $car->image_root_folder = "cars";
        $car->start_pickup_location =  explode(",", $car->start_pickup_location);
        $car->destination_pickup_location =  explode(",", $car->destination_pickup_location);
        $car->places_passing =  explode(",", $car->places_passing);

        return view('admin/car/edit-car')->with('car', $car)
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
            'own_car' => 'required|max:255',
            'msisdn'  => 'required|max:20',
            'count_seat' => 'required',
            'price' => 'required'
        ));

        // // process the login
        // if ($validator->fails()) {
        //     return Redirect::back()->withErrors($validator)
        //         ->withInput();
        // }
        $car = Car::find($id);
        $car->own_car = $request->own_car;
        $car->msisdn = $request->msisdn;
        $car->price = $request->price;
        $car->count_seat = $request->count_seat == null ? 1 : $request->count_seat;
        $car->status = $request->status == null ? 1 : $request->status;
        $car->direction = $request->direction == null ? 1 : $request->direction;
        $car->starting_location_id = $request->starting_location_id == null ? [] : $request->starting_location_id;
        $car->destination_id =  $request->destination_id;
        $car->license_plates = $request->license_plates == null ? "": $request->license_plates ;
        $car->list_image = $request->list_image_old == null ? null : $request->list_image_old;
        $car->car_type =  $request->car_type;
        $car->main_image = $request->main_image_hidden == null ? "" : $request->main_image_hidden;
        $car->start_pickup_location = $request->start_pickup_location == null ? [] : $request->start_pickup_location;
        $car->destination_pickup_location = $request->destination_pickup_location == null ? []  : $request->destination_pickup_location;
        $car->places_passing = $request->places_passing == null ? [] : $request->places_passing;

        if ($car->start_pickup_location) {
            $place = "";
            foreach ($car->start_pickup_location  as  $val) {
                $place  .=  ',' .   $val;
            }
            $car->start_pickup_location = (substr($place, 1, strlen($place)));
        } else {
            $car->start_pickup_location = "";
        }
        if ($car->destination_pickup_location) {
            $place = "";
            foreach ($car->destination_pickup_location  as  $val) {
                $place  .=  ',' .   $val;
            }
            $car->destination_pickup_location = (substr($place, 1, strlen($place)));
        } else {
            $car->destination_pickup_location = "";
        }
        $place = "";
        if ($car->places_passing) {
            foreach ($car->places_passing  as  $val) {
                $place  .=  ',' .   $val;
            }
            $car->places_passing = (substr($place, 1, strlen($place)));
        } else {
            $car->places_passing = "";
        }
        if (!isset($request->main_image_hidden)) {
            $uploadImage = $this->fileUpload($request, "cars");
            if ($uploadImage->getSession()->get('imageName') !== null) {
                $car->main_image .= $uploadImage->getSession()->get('imageName');
            }
        }
        if ($request->hasFile('list_image')) {
            $uploadMultiImage = $this->fileMultiUpload($request, "cars");
            if ($uploadMultiImage->getSession()->get('listImageName') !== null) {
                $car->list_image .= ',' . $uploadMultiImage->getSession()->get('listImageName');
            }
        }
        $car->save();

        $request->session()->flash('status', 'Update Car ' . $car->own_car . ' Successful!');
        $request->session()->flash('modal_title', 'Successful!');
        $request->session()->flash('modal_content', 'Update Car Successful!');
        return redirect('/admin/cars');
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
