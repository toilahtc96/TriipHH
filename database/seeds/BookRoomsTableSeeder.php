<?php

use Illuminate\Database\Seeder;
use App\BookRoom;

class BookRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(BookRoom::class, 2)->create();
    }
}
