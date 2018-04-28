<?php

use Illuminate\Database\Seeder;

class LocationType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('location_types')->insert([
                ['name' => 'Urban'],
                ['name' => 'Rural']
        ]);
    }
}
