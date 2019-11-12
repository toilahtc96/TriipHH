<?php

use Illuminate\Database\Seeder;
use App\Models\ComboType;

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
        factory(ComboType::class, 2)->create();
    }
}
