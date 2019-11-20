<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Hotel;
use App\Models\Combotype;
use App\Models\Car;

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
}
