<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_types')->insert([
                ['name' => 'Retail grocery shop'],
                ['name' => 'Wholesale cum retail grocery shop'],
                ['name' => 'Confectionery'],
                ['name' => 'Variety/General store'],
                ['name' => 'Other'],
        ]);
    }
}
