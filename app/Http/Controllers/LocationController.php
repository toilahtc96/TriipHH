<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locations = Location::sortable()->paginate(5);
        return view('admin/location/list-location')->with('locations', $locations)->with('table_name','locations');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/location/new-location');
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
        $this->validate($request, array(
            'location_name' => 'required|max:255',
            'detail'  => 'required'
        ));
        // store in the database
        $location =  new Location();
        $location->location_name = $request->location_name;
        $location->detail = $request->detail;
        $location->status = $request->status == null ? 1 : $request->status;
        $location->save();
        // Session::flash('success', 'The hotel post was successfully saved!');
        return redirect()->route('locations.view');
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

        $location =  Location::where('id', $id)->findOrFail($id);
        return view('admin/location/edit-location')->with('location', $location);
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
            'location_name' => 'required|max:255',
            'detail'  => 'required'
        ));

        // // process the login
        // if ($validator->fails()) {
        //     return Redirect::back()->withErrors($validator)
        //         ->withInput();
        // }
        $location  = Location::find($id);
        $location->location_name = $request->location_name;
        $location->detail = $request->detail;
        $location->status = $request->status == null ? 1 : $request->status;
        $location->save();

        $request->session()->flash('status', 'Update Location ' . $location->location_name . ' Successful!');
        $request->session()->flash('modal_title', 'Successful!');
        $request->session()->flash('modal_content', 'Update location Successful!');
        return redirect('/admin/locations');
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
