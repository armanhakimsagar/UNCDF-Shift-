<?php

use Illuminate\Database\Seeder;
use App\ResearchModel\ResourceTypeSeeder;

class ResourceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Type   = Type::create(
            
            [
                'name'          => 'document' 
            ],
            [
                'name'          => 'picture'  
            ],
            [
                'name'          => 'video'  
            ],
            [
                'name'          => 'audio'  
            ],
            [
                'name'          => 'youtube'  
            ]
        );

    }
}

