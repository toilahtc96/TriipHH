<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCombo;

class BookComboClientController extends Controller
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

        $bookcombo = new  BookCombo;

        $bookcombo->fullname = $request->fullname;
        $bookcombo->fb_link = $request->fbLink;
        $bookcombo->msisdn = $request->msisdn;
        $bookcombo->start_date = $request->startDate;
        $bookcombo->book_status_id = 1;
        $bookcombo->status = 1;
        $bookcombo->combo_id = $request->combo_id;
        $bookcombo->type_service = $request->typeService;
        $bookcombo->combo_type_id = $request->combo_type_id;


        $bookcombo->adults = $request->adults;
        $bookcombo->minors = $request->minors;
        $bookcombo->childrens = $request->childrens;
        $bookcombo->car_id = $request->car_id;
        //set cung, can sua lai tai combotrip 
        $request->pickup_place_id == null ? $bookcombo->pickup_place_id = [] : $bookcombo->pickup_place_id = $request->pickup_place_id;
        if ($bookcombo->pickup_place_id) {
            $place = "";
            foreach ($bookcombo->pickup_place_id  as  $val) {
                $place  .=  ',' .   $val;
            }
            $bookcombo->pickup_place_id = (substr($place, 1, strlen($place)));
        } else {
            $bookcombo->pickup_place_id = "";
        }
        $bookcombo->save();
        // if($bookcombo->save()){
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
