<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BookCustomTrip;

class BookCustomClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $bookCustom = new BookCustomTrip;

        $bookCustom->fullname = $request->fullname;
        $bookCustom->fb_link = $request->fbLink;
        $bookCustom->msisdn = $request->msisdn; 
        $bookCustom->start_date = $request->startDate;
        $bookCustom->book_status_id = 1;
        $bookCustom->status = 1;
        $bookCustom->room_id = $request->room_id;
        $bookCustom->type_service = $request->typeService;
        $bookCustom->combo_type_id = $request->combo_type_id;
        $bookCustom->adults =$request->adults;
        $bookCustom->minors = $request->minors; 
        $bookCustom->childrens = $request->childrens; 
        $bookCustom->number_room_book = $request->number_room_book; 
        $bookCustom->car_id =$request->car_id;
        $bookCustom->pickup_place_id = $request->pickup_place_id; 
        // $bookCustom->childrens = $request->childrens; 
        
        $bookCustom->save();
        return response()->json(['result' => "Đăng kí thành công"]);
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
