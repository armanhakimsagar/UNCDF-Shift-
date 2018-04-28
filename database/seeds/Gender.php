<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Gender extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
                ['name' => 'Male'],
                ['name' => 'Female'],
                ['name' => 'Others']
        ]);
    }
}
