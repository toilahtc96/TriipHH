<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BookCar;

class BookCarClientController extends Controller
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

        $bookCar = new BookCar;

        // fullname:$fullname,
        // msisdn:$msisdn,
        // startDate:$startDate,
        // typeService:$typeService,
        // startTime:$startTime,
        // car_id:$car_id,
        // number_ticket:$number_ticket,
        // pickup_place_id:$pickup_place_id

        $bookCar->fullname = $request->fullname;
        $bookCar->msisdn = $request->msisdn;
        $bookCar->start_date = $request->startDate;
        $bookCar->type_service = $request->typeService;
        $bookCar->start_time = $request->startTime;
        $bookCar->car_id = $request->car_id;
        $bookCar->number_ticket = $request->number_ticket;
        $bookCar->pickup_place_id = $request->pickup_place_id;

        if ($bookCar->pickup_place_id) {
            $place = "";
            foreach ($bookCar->pickup_place_id  as  $val) {
                $place  .=  ',' .   $val;
            }
            $bookCar->pickup_place_id = (substr($place, 1, strlen($place)));
        } else {
            $bookCar->pickup_place_id = "";
        }

        $bookCar->book_status_id = 9;
        $bookCar->status = 1;

        $bookCar->save();
        return response()->json(['data'=>$request->pickup_place_id,'result' => "Đăng kí thành công"]);
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