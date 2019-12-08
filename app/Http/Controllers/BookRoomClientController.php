<?php

namespace App\Http\Controllers;

use App\Models\BookRoom;
use Illuminate\Http\Request;

class BookRoomClientController  extends Controller
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
       
        $bookroom = new  BookRoom;

        $bookroom->fullname = $request->fullname;
        $bookroom->fb_link = $request->fbLink;
        $bookroom->msisdn = $request->msisdn; 
        $bookroom->start_date = $request->startDate;
        $bookroom->book_status_id = 1;
        $bookroom->status = 1;
        $bookroom->room_id = $request->room_id;
        $bookroom->type_service = $request->typeService;
        $bookroom->combo_type_id = $request->combo_type_id;
        
        
        $bookroom->adults =$request->adults;
        $bookroom->minors = $request->minors; 
        $bookroom->childrens = $request->childrens; 
        
        $bookroom->save();
        // if($bookroom->save()){
        //     return response()->json([ 'result' => 'Đăng kí thành công']);
        // };
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