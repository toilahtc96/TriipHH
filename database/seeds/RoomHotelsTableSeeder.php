<?php

use Illuminate\Database\Seeder;
use App\Models\RoomHotel;

class RoomHotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(RoomHotel::class, 2)->create();
    }
}
