<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class FrontendController extends Controller {
    /**
     * Show the application Login page.
     *
     * @return login view page
     */
    public function login() {
        return view('frontend.login');
    }
    // for getting all district to show in map
    public function getalldistrict(Request $request) {
        $division_wise_district = DB::table('location_bbs2011')
                ->where('loc_type', 'DT')
                ->get();
        return json_encode($division_wise_district);
    }
    
    public function getalldivision(Request $request) {
        $division_wise_district = DB::table('location_bbs2011')
                ->where('loc_type', 'DV')
                ->get();
        return json_encode($division_wise_district);
    }
    //hover wise district result display in map
    public function districthoverwiseresult(Request $request) {

        $dis_id = $request->dis_id;
        $idlenth = strlen($dis_id);
        if ($idlenth == 1) {
            $dis_id = "0" . $dis_id;
        }
        
        $all_filter_data    =   [];
        parse_str($request->filter_data,$all_filter_data);

        $all_rows = DB::table('org_quest_survey')
                ->select(DB::raw('count(*) as total_count'))
                ->first();
        
        $query = DB::table('org_quest_survey')
                ->select(DB::raw('count(*) as total_count'));
        
        if (isset($request->dis_id)) {
            $query->where('DISTRICT', '=', $request->dis_id);
        }
        
        if (isset($all_filter_data['location_type']) && !empty($all_filter_data['location_type'])) {
            $query->where('LOCATION_TYPE', '=', $all_filter_data['location_type']);
        }

        if (isset($all_filter_data['gender']) && !empty($all_filter_data['gender'])) {
            $query->where('Q4', '=', $all_filter_data['gender']);
        }

        if (isset($all_filter_data['business_type']) && !empty($all_filter_data['business_type'])) {
            $query->where('type_of_business', '=', $all_filter_data['business_type']);
        }

        if (isset($all_filter_data['generation']) && !empty($all_filter_data['business_type'])) {
            $gr_query = DB::table('generation_types')
                    ->select('*')
                    ->where('id', '=', $all_filter_data['generation'])
                    ->first();
            $age_range = explode("-", $gr_query->age_range);

            $age_from = $age_range[0];
            $age_to = $age_range[1];

            $query->where('Q3', '>=', $age_from);
            $query->where('Q3', '<=', $age_to);
        }
        
        
        
        $districtName = DB::table('location_bbs2011')->where('loc_type', '=', 'DT')
                        ->where('district', '!=', null)
                        ->where('district', '=', $dis_id)->first();

        $percentage = (($query->first()->total_count * 100) / $all_rows->total_count);
        $feedback_data = [
            'total_count' => $query->first()->total_count,
            'loc_name' => "Number of <br>Micro-merchants<br> at " . $districtName->loc_name_en,
            'percentage' => number_format($percentage, 2, '.', '') . "% Of Total"
        ];
        echo json_encode($feedback_data);
    }
    
    //hover wise district result display in map
    public function upazila_hoverwise_result(Request $request) {

        $up_id = $request->up_id;
        $idlenth = strlen($up_id);
        if ($idlenth == 1) {
            $up_id = "0" . $up_id;
        }
        
        $all_filter_data    =   [];
        parse_str($request->filter_data,$all_filter_data);

        $all_rows = DB::table('org_quest_survey')
                ->select(DB::raw('count(*) as total_count'))
                ->first();
        
        $query = DB::table('org_quest_survey')
                ->select(DB::raw('count(*) as total_count'));
        
        if (isset($request->up_id)) {
            $query->where('Sub_District', '=', $request->up_id);
        }
        
        if (isset($all_filter_data['location_type']) && !empty($all_filter_data['location_type'])) {
            $query->where('LOCATION_TYPE', '=', $all_filter_data['location_type']);
        }

        if (isset($all_filter_data['gender']) && !empty($all_filter_data['gender'])) {
            $query->where('Q4', '=', $all_filter_data['gender']);
        }

        if (isset($all_filter_data['business_type']) && !empty($all_filter_data['business_type'])) {
            $query->where('type_of_business', '=', $all_filter_data['business_type']);
        }

        if (isset($all_filter_data['generation']) && !empty($all_filter_data['business_type'])) {
            $gr_query = DB::table('generation_types')
                    ->select('*')
                    ->where('id', '=', $all_filter_data['generation'])
                    ->first();
            $age_range = explode("-", $gr_query->age_range);

            $age_from = $age_range[0];
            $age_to = $age_range[1];

            $query->where('Q3', '>=', $age_from);
            $query->where('Q3', '<=', $age_to);
        }
        
        
        
        $districtName = DB::table('location_bbs2011')->where('loc_type', '=', 'UP')
                        ->where('district', '=', $request->dis_id)
                        ->where('upazila', '!=', null)
                        ->where('upazila', '=', $up_id)->first();

        $percentage = (($query->first()->total_count * 100) / $all_rows->total_count);
        $feedback_data = [
            'total_count'   => $query->first()->total_count,
            'loc_name'      => "Number of <br>Micro-merchants<br> at " . $districtName->loc_name_en,
            'percentage'    => number_format($percentage, 2, '.', '') . "% Of Total"
        ];
        echo json_encode($feedback_data);
    }

    public function filter_wise_result(Request $request) {

        $all_data = $request->all();

        $all_rows = DB::table('org_quest_survey')
                ->select(DB::raw('count(*) as total_count'))
                ->first();

        $query = DB::table('org_quest_survey')
                ->select(DB::raw('count(*) as total_count'));

        if (isset($request->location_type)) {
            $query->where('LOCATION_TYPE', '=', $request->location_type);
        }

        if (isset($request->gender)) {
            $query->where('Q4', '=', $request->gender);
        }

        if (isset($request->business_type)) {
            $query->where('type_of_business', '=', $request->business_type);
        }

        if (isset($request->generation)) {
            $gr_query = DB::table('generation_types')
                    ->select('*')
                    ->where('id', '=', $request->generation)
                    ->first();
            $age_range = explode("-", $gr_query->age_range);

            $age_from = $age_range[0];
            $age_to = $age_range[1];

            $query->where('Q3', '>=', $age_from);
            $query->where('Q3', '<=', $age_to);
        }

        $searchResults = $query->first();
        $percentage = (($searchResults->total_count * 100) / $all_rows->total_count);
        $feedback_data = [
            'total_count' => $searchResults->total_count,
            'loc_name' => "Number of <br>Micro-merchants",
            'percentage' => number_format($percentage, 2, '.', '') . "% Of Total"
        ];
        echo json_encode($feedback_data);
    }

    public function getdistrictresult(Request $request) {
//        dd($request->all());
        
        $division_wise_district_code = DB::table('location_bbs2011')
                ->select('district')
                ->where('loc_type', 'DT')
                ->where('loc_name_en', $request['dis_name'])
                ->first();

        $division_wise_district = DB::table('location_bbs2011')
                ->where('loc_type', 'UP')
                ->where('district', $division_wise_district_code->district)
                ->where('json_filename', '!=', 'NULL')
                ->get();

        return json_encode($division_wise_district);
        //print_r($division_wise_district);
    }
    
    public function heatmapcolor(Request $request) {
        $all_filter_data    =   [];
        parse_str($request->filter_data,$all_filter_data);
        $query = DB::table('org_quest_survey')
                ->select(DB::raw('count(*) as total_count'));
        
        if (isset($request->dis_id)) {
            $query->where('DISTRICT', '=', $request->dis_id);
        }
        
        if (isset($all_filter_data['location_type']) && !empty($all_filter_data['location_type'])) {
            $query->where('LOCATION_TYPE', '=', $all_filter_data['location_type']);
        }

        if (isset($all_filter_data['gender']) && !empty($all_filter_data['gender'])) {
            $query->where('Q4', '=', $all_filter_data['gender']);
        }

        if (isset($all_filter_data['business_type']) && !empty($all_filter_data['business_type'])) {
            $query->where('type_of_business', '=', $all_filter_data['business_type']);
        }

        if (isset($all_filter_data['generation']) && !empty($all_filter_data['business_type'])) {
            $gr_query = DB::table('generation_types')
                    ->select('*')
                    ->where('id', '=', $all_filter_data['generation'])
                    ->first();
            $age_range = explode("-", $gr_query->age_range);

            $age_from = $age_range[0];
            $age_to = $age_range[1];

            $query->where('Q3', '>=', $age_from);
            $query->where('Q3', '<=', $age_to);
        }
        
        $check_query    =   $query->first();
        if (count($check_query) > 0 && $query->first()->total_count > 0) {
            $colorquery = DB::select('SELECT color FROM `msi_ranges` s WHERE ' . $query->first()->total_count. ' <= s.to AND ' . $query->first()->total_count . '>=s.from');
            if(isset($colorquery[0]->color) && !empty($colorquery[0]->color)){
                $colorcode = $colorquery[0]->color;
            }else{
                $colorcode = "white";
            }
            echo $colorcode;
        } else {
            $colorcode = "white";
            echo $colorcode;
        }
    }
    
    public function heat_map_color_upazila(Request $request) {
        $all_filter_data    =   [];
        parse_str($request->filter_data,$all_filter_data);
        $query = DB::table('org_quest_survey')
                ->select(DB::raw('count(*) as total_count'));
        
        if (isset($request->up_id)) {
            $query->where('Sub_District', '=', $request->up_id);
        }
        
        if (isset($all_filter_data['location_type']) && !empty($all_filter_data['location_type'])) {
            $query->where('LOCATION_TYPE', '=', $all_filter_data['location_type']);
        }

        if (isset($all_filter_data['gender']) && !empty($all_filter_data['gender'])) {
            $query->where('Q4', '=', $all_filter_data['gender']);
        }

        if (isset($all_filter_data['business_type']) && !empty($all_filter_data['business_type'])) {
            $query->where('type_of_business', '=', $all_filter_data['business_type']);
        }

        if (isset($all_filter_data['generation']) && !empty($all_filter_data['business_type'])) {
            $gr_query = DB::table('generation_types')
                    ->select('*')
                    ->where('id', '=', $all_filter_data['generation'])
                    ->first();
            $age_range = explode("-", $gr_query->age_range);

            $age_from = $age_range[0];
            $age_to = $age_range[1];

            $query->where('Q3', '>=', $age_from);
            $query->where('Q3', '<=', $age_to);
        }
        
        
        $check_query    =   $query->first();
        if (isset($check_query) && $query->first()->total_count > 0) {
            $colorquery = DB::select('SELECT color FROM `msi_ranges` s WHERE ' . $query->first()->total_count. ' <= s.to AND ' . $query->first()->total_count . '>=s.from');
            if(isset($colorquery[0]->color) && !empty($colorquery[0]->color)){
                $colorcode = $colorquery[0]->color;
            }else{
                $colorcode = "white";
            }
        } else {
            $colorcode = "white";
        }
        
        echo $colorcode;
    }
}
