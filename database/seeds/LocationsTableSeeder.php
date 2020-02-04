<?php

use Illuminate\Database\Seeder;
use App\Models\Location;
use Illuminate\Support\Facades\DB;
class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::Table('locations')->insert([
            ['location_name'=>'26 LÁNG HẠ','detail'=>'điểm đón 26 láng hạ','status'=>1], 
            ['location_name'=>'LÊ VĂN LƯƠNG','detail'=>'đầu đường lvl','status'=>1], 
            ['location_name'=>'91 KHUẤT DUY TIẾN','detail'=>'bến 91 khuất duy tiến','status'=>1], 
            ['location_name'=>'AEON MALL LONG BIÊN ','detail'=>'cổng trung tâm AEON MALL','status'=>1], 
            ['location_name'=>'ĐẦU ĐƯỜNG CAO TỐC','detail'=>'đầu đường cao tốc hướng Hà Nội','status'=>1], 
            ['location_name'=>'HẢI PHÒNG','detail'=>'Hải phòng','status'=>1],
            ]);
    }
}
