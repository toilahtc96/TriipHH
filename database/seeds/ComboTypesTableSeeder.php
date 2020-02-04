<?php

use Illuminate\Database\Seeder;
use App\Models\ComboType;
use Illuminate\Support\Facades\DB;
class ComboTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::Table('combo_types')->insert([
            ['combo_type_name'=>'1N1Đ','detail'=>'1 ngày đêm 1','status'=>1], 
            ['combo_type_name'=>'2N1Đ','detail'=>'2 ngày đêm 1','status'=>1], 
            ['combo_type_name'=>'3N2Đ','detail'=>'3 ngày đêm 2','status'=>1], 
            ['combo_type_name'=>'4N3Đ','detail'=>'4 ngày đêm 3','status'=>1], 
            ['combo_type_name'=>'5N4Đ','detail'=>'5 ngày đêm 4','status'=>1], 
            ]);
    }
}
