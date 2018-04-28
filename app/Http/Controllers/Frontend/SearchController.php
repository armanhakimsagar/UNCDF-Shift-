<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use View;

class SearchController extends Controller {

    public function serach_data_retrieve(Request $request) {
        $check_array = [];
        $results = [];
        $search_data = [];
        $search_text = trim($_GET['serach_text_param']);
        $search_keywords = (explode(" ", $search_text));

        $table_name = ['researches', 'trainings'];
        for( $i = 0; $i<count($table_name); $i++) {
            
            

            foreach ($search_keywords as $keyword) {
                $tableData = [];
                $getTable = $table_name[$i];
                $results = DB::select(DB::raw("SELECT * FROM $getTable WHERE title LIKE '%$keyword%' or textarea_data LIKE '%$keyword%'"));
                foreach ($results as $res) {
                    if (isset($res->id) && !in_array($res->id, $check_array)) {
                        $tableData[] = $res;
                        $check_array[] = $res->id;
                    }
                    //return ($search_data);
                }
                $search_data[] = [
                    'table_name_url' => $getTable,
                    'data' => $tableData,
                ];
            }
        }
        
        //return $search_data;
        
        $view_show = View::make('frontend.serach_result_view', compact('search_data'));
        echo $view_show;
    }

}
