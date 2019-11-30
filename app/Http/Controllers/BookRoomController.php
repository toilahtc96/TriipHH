<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRoom;
use App\Models\RoomHotel;
use App\Models\Car;
use App\Models\ComboType;
use App\Models\Hotel;
use App\Models\BookStatus;


class BookRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookstatuses = $this->getListBookStatusForCBB();
        $bookrooms = BookRoom::select(
            'book_rooms.*',
            'room_hotels.level',
            'hotels.hotel_name',
            'combo_types.combo_type_name',
            'book_statuses.status'
        )
            ->leftJoin('room_hotels', 'room_hotels.id', '=', 'book_rooms.room_id')
            ->leftJoin('combo_types', 'combo_types.id', '=', 'book_rooms.combo_type_id')
            ->leftJoin('hotels', 'hotels.id', '=', 'room_hotels.hotel_id')
            ->leftJoin('book_statuses', 'book_statuses.id', '=', 'book_rooms.book_status_id')
            ->sortable()->paginate(5);
        return view('admin/bookroom/list-bookroom')->with('bookrooms', $bookrooms)
            ->with('bookstatuses', $bookstatuses)->with('table_name','book_rooms');
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
        $combotypes = $this->getListComboTypeForCBB();
        $bookroom = BookRoom::where('id', $id)->firstOrFail();
        $hotel_id = RoomHotel::select('hotel_id')->where('id', $bookroom->room_id)->firstOrFail();
        $hotel = "";
        $room = "";
        $hotels = $this->getListHotelForCBB();

        if (isset($hotel_id)) {
            $hotel = Hotel::where('id', $hotel_id->hotel_id)->firstOrFail();
            $rooms = $this->getListRoomByHotelIdForCBB($hotel_id->hotel_id);
        }
        return view('admin/bookroom/edit-bookroom')->with('combotypes', $combotypes)
            ->with('bookroom', $bookroom)->with('rooms', $rooms)->with('hotels', $hotels)
            ->with('hotel', $hotel)
            ->with('hotel_id', $hotel == null ? 0 : $hotel->id);
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
            'fullname' => 'required|max:255',
            'msisdn'  => 'required|max:20',
        ));
        $bookRoom  = BookRoom::findOrFail($id);

        $input = $request->all();

        $bookRoom->fill($input)->save();
        return redirect('/admin/bookrooms');
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
