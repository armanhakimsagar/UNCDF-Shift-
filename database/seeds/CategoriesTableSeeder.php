<?php

use Illuminate\Database\Seeder;
use App\ResearchModel\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category   = Category::create(
		[
            'category_name'  		=> 'a',
            'type_id'				=> '1'

        ],
		[
            'category_name'  		=> 'b',
            'type_id'				=> '2'  
        ],
        [
            'category_name'  		=> 'c',
            'type_id'				=> '3'  
        ],
        [
            'category_name'  		=> 'd',
            'type_id'				=> '4'  
        ]
		);
    }
}
