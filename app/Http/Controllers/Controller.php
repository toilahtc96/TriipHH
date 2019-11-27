<?php

namespace App\Http\Controllers;

use App\Models\BookCombo;
use App\Models\BookCustomTrip;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Hotel;
use App\Models\Combotype;
use App\Models\Car;
use App\Models\RoomHotel;
use App\Models\ComboTrip;
use App\Models\BookStatus;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function fileUpload(Request $request, $folderName)
    {

        $this->validate($request, [
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('main_image')) {

            $image = $request->file('main_image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/' . $folderName);
            $image->move($destinationPath, $name);

            return back()->with('status', 'Image Upload successfully')->with('imageName', $name);
        }
    }

    public function fileMultiUpload(Request $request, $folderName)
    {
        $imageMimeTypes = array(
            'image/png',
            'image/gif',
            'image/jpeg'
        );
        $this->validate($request, [
            'list_image' => 'required',
        ]);

        if ($request->hasFile('list_image')) {

            $images = $request->file('list_image');

            $listImageName = "";
            foreach ($images as $key => $image) {
                $fileMimeType = mime_content_type($image->path());
                if (in_array($fileMimeType, $imageMimeTypes)) {
                    $name = time() . $key . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/' . $folderName);
                    $image->move($destinationPath, $name);
                    $listImageName .= $name . ",";
                } else {
                    echo ('file ' . $image->getClientOriginalName() . ' is not image');
                    continue;
                }
            }
            $list_image = substr($listImageName, 0, strlen($listImageName) - 1);

            return back()->with('status', 'Image Upload successfully')->with('listImageName', $list_image);
        }
    }


    public function createLocationList($list, $id, $name, $value)
    {
        $places_passing_arr = explode(";", $value);

        foreach ($places_passing_arr as $k => $value) {
            $eachStart = Location::select('id', 'location_name')->where('id', $value)->first();
            if (isset($eachStart)) {
                $list[$id][$name][$k] = $eachStart;
            }
        }
        return $list;
    }

    public function changeStatus()
    {
        if (isset($_POST["table"]) && isset($_POST["id"]) && isset($_POST["status"])) {
            $table = $_POST["table"];
            $id = $_POST["id"];
            $status = $_POST["status"];
            switch ($table) {
                case "hotel":
                    $hotel = Hotel::findOrFail($id);
                    if ($hotel) {
                        $hotel->status = $status;
                        $hotel->save();

                        return response()->json([
                            'result' => "Cập nhật thành công cho Khách sạn : " . $hotel->hotel_name,
                        ]);
                    }
                    break;
                case "location":
                    $location = Location::findOrFail($id);
                    if ($location) {
                        $location->status = $status;
                        $location->save();

                        return response()->json([
                            'result' => "Cập nhật thành công cho Địa chỉ  : " . $location->location_name,
                        ]);
                    }
                    break;
                case "combotype":
                    $combotype = Combotype::findOrFail($id);
                    if ($combotype) {
                        $combotype->status = $status;
                        $combotype->save();

                        return response()->json([
                            'result' => "Cập nhật thành công cho Loại Combo  : " . $combotype->combo_type_name,
                        ]);
                    }
                    break;
                case "roomHotel":
                    $roomhotel = RoomHotel::findOrFail($id);
                    if ($roomhotel) {
                        $roomhotel->status = $status;
                        $roomhotel->save();

                        return response()->json([
                            'result' => "Cập nhật thành công cho Phòng"
                        ]);
                    }
                    break;
                case "car":
                    $car = Car::findOrFail($id);
                    if ($car) {
                        $car->status = $status;
                        $car->save();
                        return response()->json([
                            'result' => "Cập nhật thành công cho Xe  : " . $car->own_car,
                        ]);
                    }
                    break;

                case "combotrip":
                    $combotrip = ComboTrip::findOrFail($id);
                    if ($combotrip) {
                        $combotrip->status = $status;
                        $combotrip->save();
                        return response()->json([
                            'result' => "Cập nhật thành công cho Combo  "
                        ]);
                    }
                    break;

                default:
                    return response()->json([
                        'result' => "Đối tượng cập nhật không đúng!"
                    ]);
            }
            return  response()->json([
                'result' => "ok"
            ]);
        } else {
            return response()->json([
                'result' => "Có lỗi khi cập nhật trạng thái, Vui lòng báo đội phát triển!"
            ]);
        }
    }

    public function getListLocationName($listId)
    {
        //phai cat
        $placeAround = '';
        $arrName = explode(",", $listId);

        foreach ($arrName as $key => $val) {
            $locationName = Location::select('location_name')->findOrFail($val)->location_name;
            if ($key > 0) {
                $placeAround .= ",\n" . $locationName;
            }
            $placeAround .= $locationName;
        }
        return $placeAround;
    }

    public function getListLocationForCBB()
    {
        $locationdb = Location::get();
        $locations  = [];
        foreach ($locationdb as $key => $val) {
            $locations[$val->id] = $val->location_name;
        }
        return $locations;
    }

    public function getListHotelForCBB()
    {
        $hoteldb = Hotel::get();
        $hotels  = [];
        foreach ($hoteldb as $key => $val) {
            $hotels[$val->id] = $val->hotel_name;
        }
        return $hotels;
    }
    public function getListCarForCBB()
    {
        $cardb = Car::get();
        $cars  = [];
        foreach ($cardb as $key => $val) {
            $cars[$val->id] = $val->own_car . ' - ' . $val->car_type;
        }
        return $cars;
    }

    public function getListBookStatusForCBB()
    {
        $bookStatusDb = BookStatus::get();
        $bookstatuses  = [];
        foreach ($bookStatusDb as $key => $val) {
            $bookstatuses[$val->id] = $val->status;
        }
        return $bookstatuses;
    }

    public function getListComboTypeForCBB()
    {
        $comboTypedb = ComboType::get();
        $comboTypes  = [];
        foreach ($comboTypedb as $key => $val) {
            $comboTypes[$val->id] = $val->combo_type_name . ' - ' . $val->detail;
        }
        return $comboTypes;
    }

    public function getListComboTripForCBB()
    {
        $comboTripdb = ComboTrip::select('combo_trips.*','combo_types.combo_type_name')
        ->leftJoin('combo_types', 'combo_types.id', '=', 'combo_trips.combo_type_id')
        ->get();
        $comboTrips  = [];
        foreach ($comboTripdb as $key => $val) {
            $comboTrips[$val->id] = $val->combo_trip_name . ' - '.$val->combo_type_name .' - (' . $val->start_date . '-> ' . $val->end_date . ')';
        }
        return $comboTrips;
    }



    public function getListRoomByHotelIdForCBB($id)
    {
        $roomHoteldb = RoomHotel::where('hotel_id', $id)->get();
        $roomHotels  = [];
        foreach ($roomHoteldb as $key => $val) {
            $roomHotels[$val->id] = $val->level . ' Sao';
        }
        return $roomHotels;
    }

    public function getListRoomdForCBB()
    {
        $roomHoteldb = RoomHotel::get();
        $roomHotels  = [];
        foreach ($roomHoteldb as $key => $val) {
            $roomHotels[$val->id] = $val->level . ' Sao';
        }
        return $roomHotels;
    }


    public function getListRoomByHotelIdAjaxForCBB()
    {
        if (isset($_POST["id"])) {
            $roomHoteldb = RoomHotel::where('hotel_id', $_POST["id"])->get();
            $roomHotels  = [];
            foreach ($roomHoteldb as $key => $val) {
                $roomHotels[$val->id] = $val->level;
            }
            return response()->json(['data' => $roomHotels, 'result' => 'Get OK']);
        }
    }




    public function changeBookStatusNew()
    {
        if (isset($_POST["key"]) && isset($_POST["id"])) {
            $id = $_POST["key"]; // 9
            $idBookSelect =  $_POST["id"];
            $arrIdSend = explode("book_status_", $idBookSelect);
            $tableId = $arrIdSend[1];

            $numberLastIndex = strripos($tableId, "_");
            $tableName = substr($tableId, 0, $numberLastIndex);
            $idObject = substr($tableId, $numberLastIndex + 1);
            $book_status_df = $id;
            if ($id == 9) {
                $book_status_df = 6;
            }
            if ($id == 6 || $id == 8) {
                $book_status_df = 8;
            }
            $statusNew = "";
            switch ($tableName) {
                case "book_custom_trips":
                    $bookCustomTrip = BookCustomTrip::find($idObject);
                    $bookCustomTrip->book_status_id =  $book_status_df;
                    if (
                        isset($_POST["roomcode"]) && isset($_POST["cinDate"]) && isset($_POST["cinTime"])
                        && isset($_POST["coutDate"]) && isset($_POST["coutTime"])
                    ) {
                        $bookCustomTrip->room_code = $_POST["roomcode"];
                        $bookCustomTrip->checkin_date = $_POST["cinDate"];
                        $bookCustomTrip->checkin_time = $_POST["cinTime"];
                        $bookCustomTrip->checkout_date = $_POST["coutDate"];
                        $bookCustomTrip->checkout_time = $_POST["coutTime"];
                    }
                    if (isset($_POST["rejectNote"])) {
                        $bookCustomTrip->reject_note = $_POST["rejectNote"];
                    }
                    $bookCustomTrip->save();
                    $statusNew = BookStatus::select('status')->findOrFail($book_status_df);
                    break;

                case "book_combos":
                    $bookCombo = BookCombo::find($idObject);
                    $bookCombo->book_status_id =  $book_status_df;
                    if (
                        isset($_POST["roomcode"]) && isset($_POST["cinDate"]) && isset($_POST["cinTime"])
                        && isset($_POST["coutDate"]) && isset($_POST["coutTime"])
                    ) {
                        $bookCombo->room_code = $_POST["roomcode"];
                        $bookCombo->checkin_date = $_POST["cinDate"];
                        $bookCombo->checkin_time = $_POST["cinTime"];
                        $bookCombo->checkout_date = $_POST["coutDate"];
                        $bookCombo->checkout_time = $_POST["coutTime"];
                    }
                    if (isset($_POST["rejectNote"])) {
                        $bookCombo->reject_note = $_POST["rejectNote"];
                    }
                    $bookCombo->save();
                    $statusNew = BookStatus::select('status')->findOrFail($book_status_df);
                    break;

                default:
                    break;
            }
            $bookStatus = BookStatus::where('position', 6)->firstOrFail();
            if ($id != 9) {
                $bookStatus = BookStatus::where('position', $id)->firstOrFail();
            }
            $status = "";
            if (isset($bookStatus)) {
                $status = $bookStatus->status;
            }

            return response()->json([
                'result' => "Succes",
                'data' => $status,
                'statusNew' => $statusNew,
                'idStatusNew' => $book_status_df
            ]);
        }

        return response()->json([
            'result' => "Không có id book"
        ]);
    }
}
