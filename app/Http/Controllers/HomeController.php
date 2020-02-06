<?php

namespace App\Http\Controllers;

use App\Models\ComboTrip;
use App\Models\Hotel;
use App\Models\RoomHotel;
use App\Models\Location;
use App\Models\Car;
use App\Models\BookCombo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $hotels = Hotel::sortable(['updated_at'=>'desc'])->paginate(6);
        foreach ($hotels as $key => $value) {
            # code...
            $room = RoomHotel::MIN('price')->where('room_hotels.status', 1)->where('room_hotels.hotel_id', $value->id)->first();
            if($room){
                $value->price = $room->price;
            }
        }
        $combotrips = ComboTrip::select('combo_trips.*','hotels.hotel_name')->where('combo_trips.status',1)
        ->leftJoin('hotels','combo_trips.hotel_id','=','hotels.id')->sortable(['created'=>'desc'])->paginate(6);

        $combotypes = $this->getListComboTypeActiveForCBB();
        // dd($combotrips);
        // dien den
        $countLocation = count(Location::get());
        
        // hotel 
        $countHotel = count(Hotel::get());
        //khach hang
        $countCustomer = count(BookCombo::get());
        //xe
        $countCar = count(Car::get());
        $bannerImage = Hotel::select('main_image')->orderByRaw('updated_at - created_at DESC')->first();
        $banner = $bannerImage->main_image;
        return view('client.home')->with('hotels',$hotels)
        ->with('banner',$banner)
        ->with('combotrips',$combotrips)
        ->with('combotypes',$combotypes)
        ->with('countLocation',$countLocation)
        ->with('countHotel',$countHotel)
        ->with('countCustomer',$countCustomer)
        ->with('countCar',$countCar);
        
    }

    public function contact()
    {
        $bannerImage = Hotel::select('main_image')->orderByRaw('updated_at - created_at DESC')->first();
        $banner = $bannerImage->main_image;
        return view('client.contact.contact')->with('banner',$banner);
    }

    public function introduce()
    {
        $bannerImage = Hotel::select('main_image')->orderByRaw('updated_at - created_at DESC')->first();
        $banner = $bannerImage->main_image;
        return view('client.contact.introduce')->with('banner',$banner);
    }

    public function bookcustom()
    {
        $bannerImage = Hotel::select('main_image')->orderByRaw('updated_at - created_at DESC')->first();
        $banner = $bannerImage->main_image;
        $hotels = $this->getListHotelActiveForCBB();
        $rooms = ["Loại phòng"];
        $combotypes = $this->getListComboTypeActiveForCBB();
        $cars = $this->getListCarOfDirectionActiveForCBB();
        return view('client.home.bookcustom')->with('cars',$cars)->with('combotypes',$combotypes)
        ->with('hotels',$hotels)->with('rooms',$rooms)->with('banner',$banner);
    }

    public function bookcar()
    {
        $bannerImage = Hotel::select('main_image')->orderByRaw('updated_at - created_at DESC')->first();
        $banner = $bannerImage->main_image;
        $cars = $this->getListCarOfDirectionActiveForCBB();
        return view('client.home.bookcar')->with('cars',$cars)->with('banner',$banner);
    }

}
