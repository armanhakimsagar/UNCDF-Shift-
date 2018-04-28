<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generation_types')->insert([
                ['name' => 'Builders(Aged 70s-80s)', 'age_range' => '70-80'],
                ['name' => 'Baby Boomers(Aged 50s-60s)', 'age_range' => '50-69'],
                ['name' => 'Gen X(Aged 30s-40s)', 'age_range' => '30-49'],
                ['name' => 'Gen Y(Aged 20s- early 30s)', 'age_range' => '20-29'],
                ['name' => 'Gen Z(Aged kids-teens)', 'age_range' => '1-19'],
        ]);
    }
}
