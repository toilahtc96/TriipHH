<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCar;
use App\Models\Location;
use App\Models\Car;
use App\Models\Hotel;
use App\Models\BookStatus;
use Kyslik\ColumnSortable\Sortable;

class BookCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookcars = BookCar::select('book_cars.*', 'locations.location_name', 'cars.own_car', 'cars.car_type', 'book_statuses.status')
            ->leftJoin('locations', 'locations.id', '=', 'book_cars.pickup_place_id')
            ->leftJoin('cars', 'cars.id', '=', 'book_cars.car_id')
            ->leftJoin('book_statuses', 'book_statuses.id', '=', 'book_cars.book_status_id')
            ->sortable()->paginate(5);
        return view('admin/bookcar/list-bookcar')->with('bookcars', $bookcars)
        ->with('table_name', 'book_cars')->with('url_link','bookcars');
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
        $locations = $this->getListLocationForCBB();
        $bookcar = BookCar::select('book_cars.*','book_statuses.status')->where('book_cars.id',$id)
        ->leftJoin('book_statuses', 'book_cars.book_status_id', '=', 'book_statuses.id')
        ->firstOrFail();
        // dd($bookcar);
        return view('admin/bookcar/edit-bookcar')->with('bookcar', $bookcar)->with('locations',$locations)->with('url_link','bookcars');
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
        $locations = $this->getListLocationForCBB();
        $book_car = BookCar::where('book_cars.id',$id)->firstOrFail();

        if($book_car){
            $book_car->reject_note=$request->reject_note;
            $book_car->fullname=$request->fullname;
            $book_car->fb_link=$request->fb_link;
            $book_car->msisdn=$request->msisdn;
            $book_car->type_service=$request->type_service;
            $book_car->start_date=$request->start_date;
            $book_car->arrival_time=$request->arrival_time;
            $book_car->pickup_place_id=$request->pickup_place_id;
            $book_car->price=$request->price;
            $book_car->save();
            $bookcar = BookCar::select('book_cars.*','book_statuses.status')->where('book_cars.id',$id)
        ->leftJoin('book_statuses', 'book_cars.book_status_id', '=', 'book_statuses.id')
        ->firstOrFail();
            return view('admin/bookcar/edit-bookcar')->with('bookcar', $bookcar)
            ->with('locations',$locations)->with('url_link','bookcars');
        }
        return view('admin');
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