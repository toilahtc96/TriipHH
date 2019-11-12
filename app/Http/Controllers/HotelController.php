<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hotels =  Hotel::where('status', 1)
            ->orderBy('hotel_name', 'desc')
            ->take(10)
            ->get();
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

        return view('admin/hotel/new-hotel');
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


        // dd($hotel);
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
        $hotel =  Hotel::where('status', 1)->where('id', $id)->findOrFail($id);
        return view('admin/hotel/edit-hotel')->with('hotel', $hotel);
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

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|max:255',
        // ]);

        // // process the login
        // if ($validator->fails()) {
        //     return Redirect::back()->withErrors($validator)
        //         ->withInput();
        // }
        // $sport = Sport::find($id);
        // $sport->name = Input::get('name');
        // $sport->save();

        // Session::flash('message', 'Félicitation, vous avez mis à jour un sport !');
        // return redirect('/admin/sports');
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
