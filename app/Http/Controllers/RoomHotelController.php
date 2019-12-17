<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\RoomHotel;

class RoomHotelController extends Controller
{
    public function index()
    {


        $roomHotels = RoomHotel::select('room_hotels.*', 'hotel_name')
            ->leftJoin('hotels', 'room_hotels.hotel_id', '=', 'hotels.id')
            ->sortable()->paginate(5);

        foreach ($roomHotels as $key => $val) {
            $val->service_included = str_replace(";", "\n", $val->service_included);
            $val->service_included = str_replace(".", ". ", $val->service_included);
        }
        return view('admin/roomhotel/list-room')->with('roomHotels', $roomHotels)
        ->with('table_name','room_hotels')->with('url_link','roomhotels');
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
        
        return view('admin/roomhotel/new-room')->with('hotels', $hotels)->with('url_link','roomhotels');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        // validate the data
        $validatedData = $request->validate([
            'hotel_id' => 'required|max:255',
            'level'  => 'required|max:20',
            'price' => 'required',
            'info'=> 'required|max:200',
            'slugs'=>'required',
            'room_name'=>'required'
        ]);
        // store in the database
        $roomhotel =  new RoomHotel();
        $roomhotel->hotel_id = $request->hotel_id;
        $roomhotel->price = $request->price;
        $roomhotel->status = $request->status;
        $roomhotel->level = $request->level;
        $roomhotel->service_included = $request->service_included;
        $roomhotel->info = $request->info;
        $roomhotel->room_name = $request->room_name;
        $roomhotel->slugs = $request->slugs;
        $uploadImage = $this->fileUpload($request, "roomhotels");
        if ($uploadImage->getSession()->get('imageName') !== null) {
            $roomhotel->main_image = $uploadImage->getSession()->get('imageName');
        }
        $uploadMultiImage = $this->fileMultiUpload($request, "roomhotels");
        if ($uploadImage->getSession()->get('listImageName') !== null) {
            $roomhotel->list_image = $uploadMultiImage->getSession()->get('listImageName');
        }
        // dd($roomhotel);
        $roomhotel->save();
        $request->session()->flash('success', 'The Room post was successfully saved!');
        return redirect()->route('roomhotels.view')->with('url_link','roomhotels');
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
        $roomhotel =  RoomHotel::findOrFail($id);
        $hotels = $this->getListHotelForCBB();
        $roomhotel->image_root_folder = "roomhotels";

        return view('admin/roomhotel/edit-room')->with('hotels', $hotels)
            ->with('roomhotel', $roomhotel)->with('url_link','roomhotels');
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
        // dd($request);
        $validatedData = $request->validate([
            'hotel_id' => 'required|max:255',
            'level'  => 'required|max:20',
            'price' => 'required',
            'info'=> 'required|max:200',
            'slugs'=>'required',
            'room_name'=>'required'
        ]);

        // // process the login
        // if ($validator->fails()) {
        //     return Redirect::back()->withErrors($validator)
        //         ->withInput();
        // }
        $roomhotel = RoomHotel::find($id);
        $roomhotel->hotel_id = $request->hotel_id;
        $roomhotel->price = $request->price;
        $roomhotel->level = $request->level;
        $roomhotel->service_included = $request->service_included;
        $roomhotel->info = $request->info;
        $roomhotel->room_name = $request->room_name;
        $roomhotel->slugs = $request->slugs;
        $roomhotel->status = $request->status == null ? 1 : $request->status;

        $roomhotel->list_image = $request->list_image_old == null ? null : $request->list_image_old;
        $roomhotel->main_image = $request->main_image_hidden == null ? "" : $request->main_image_hidden;
        if (!isset($request->main_image_hidden)) {
            $uploadImage = $this->fileUpload($request, "roomhotels");
            if ($uploadImage->getSession()->get('imageName') !== null) {
                $roomhotel->main_image .= $uploadImage->getSession()->get('imageName');
            }
        }
        if ($request->hasFile('list_image')) {
            $uploadMultiImage = $this->fileMultiUpload($request, "roomhotels");
            if ($uploadMultiImage->getSession()->get('listImageName') !== null) {
                $roomhotel->list_image .= ',' . $uploadMultiImage->getSession()->get('listImageName');
            }
        }
        $roomhotel->save();

        $request->session()->flash('status', 'Update Room Successful!');
        $request->session()->flash('modal_title', 'Successful!');
        $request->session()->flash('modal_content', 'Update Room Successful!');
        return redirect('/admin/roomhotels')->with('url_link','roomhotels');
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