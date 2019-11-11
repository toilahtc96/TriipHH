<?php

use Illuminate\Database\Seeder;
use App\BookCombo;
class BookCombosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(BookCombo::class, 2)->create();
    }
}
