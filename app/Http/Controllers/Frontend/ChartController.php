<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use DB;
use view;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ChartController extends Controller{
    /*
     |==========================================================================
     |generel table query method 
     |@author   :   Tanveer Qureshee
     |@data     :   15-03-2018    
     |@param    :   conditional param with tablename, where condition;
     |@output   :   Return Resource Data and json data (depending on param)
     |==========================================================================
     */
    
    public function get_table_data(Request $request) {
        $param  =   json_decode($request->param);
        // assign default data value:
        
        $status     =   "error";   
        $message    =   "Data Not Found";  
        $query_data =   "";
        $x_axis     =   "";

        if($request->csv == true){
            $query_data = getNameCountFromCSV('org_quest_survey',$request->cmp_field,2100,'ID');
            //$percent_calc = ($query_data['y_data'];
            $feedback_data = [
                'status'    => "success",
                'result'    => $query_data['result'],
                'x_axis'    => $query_data['x_data'],
                'y_axis'    => $query_data['y_data'],
                'message'   => $message
            ];
            
            // check how to return:
            if($param->return_type    ==  'json'){
                echo json_encode($feedback_data);
            }else{
                return $feedback_data;
            }
        }else{
        // end of assinging
        
        //dynamic query:
            $query = DB::table($param->table)->select($param->fields_name, DB::raw('count(*) y'))->orderBy('sort_by', 'asc');
            
            // check query has where condition:
            if(isset($param->where) && !empty($param->where)){
                $query->where($param->where);
            }
            
            if (isset($request->location_type) && !empty($request->location_type)) {
                $query->where('location_type', '=', $request->location_type);
            }

            if (isset($request->gender) && !empty($request->gender)) {
                $query->where('gender', '=', $request->gender);
            }

            if (isset($request->business_type) && !empty($request->business_type)) {
                $query->where('type_of_business', '=', $request->business_type);
            }

            if (isset($request->generation) && !empty($request->business_type)) {
                $gr_query = DB::table('generation_types')
                        ->select('*')
                        ->where('id', '=', $request->generation)
                        ->first();
                $age_range = explode("-", $gr_query->age_range);

                $age_from = $age_range[0];
                $age_to = $age_range[1];

                $query->where('age', '>=', $age_from);
                $query->where('age', '<=', $age_to);
            }
            
            // check query has groupby:
            if(isset($param->groupBy) && !empty($param->groupBy)){
                $query->groupBy($param->groupBy);
            }
            
            // check query has row or not
            if($query->get()){
                $query_data     =   $query->get();
                $status         =   "success";   
                $message        =   "Data Found";
            }
            
            // check x_axis data param
            if(isset($param->x_axis) && !empty($param->x_axis)){
                $x_axis =   $query_data->pluck($param->x_axis);
            }
            
            //Percentage Calculation

            //$percent_calc = [];
                $percent_calc = $query_data->pluck('y');
                $result = [];
            foreach ($percent_calc as $val) {
                $chengeVal  =   (($val*100)/2100);
                array_push($result, (float)number_format($chengeVal, 2, '.', ''));

            }
/*            $decimalNbr= strlen(substr(strrchr($final, "."), 1));    
            $result = number_format($result,(is_float($result) ? (($decimalNbr>2) ? 2 : $decimalNbr) : 0));*/
            // make return data:
            $feedback_data = [
                'status'    => $status,
                'result'    => $query_data,
                'x_axis'    => $x_axis,
                'y_axis'    => $result,
                'message'   => $message
            ];
            
            // check how to return:
            if($param->return_type    ==  'json'){
                echo json_encode($feedback_data);
            }else{
                return $feedback_data;
            }
        }        
    }
    /*
     * +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     * Method is using to calculate and find all box plot chart data
     * @author   :   Tanveer Qureshee
     * @data     :   10-04-2018 
     * @param: Request Data
     * Calculate the following equation:
     * $medianValue
     * $lowerMedianValue
     * $upperMedianValue
     * $minValue
     * $maxValue
     * $loweroutbound
     * $upperoutbound     
     * +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     */
    public function get_box_chart_data(Request $request) {
        $nameColumnArray    =   [
            'q8'            => "Number of household member",
            'q9'            => "Number of household member above the age of 18",
            'Q23_1'         => "Total Customer(Average)",
            'Q23_2'         => "Regular Customer(Average)",
            'Q55_TIME'      => "Distance of Nearest bank (Time)",
            'Q55_COST'      => "Distance of Nearest bank (Cost)",
        ];
        $dataCheck      =   [];
        $categories     =   [];
        $param          =   json_decode($request->param);
        $count          =   1;  
        $outboundLayer  =   [];
        if(isset($param->fields) && !empty($param->fields)){
            foreach($param->fields as $field){
                $createArrayData        =   [];                
                $dataResponse           =   DB::table($param->table)->select(DB::raw("min($field) as min_value, max($field) as max_value"))->first(); 
                $dataResponseField      =   DB::table($param->table)->select(DB::raw("$field"))->get();  
                $allValue               =   $dataResponseField->pluck($field);
                foreach($allValue as $dataV){
                    $createArrayData[]     =    $dataV;
                }
                // Descending ordering short:
                Arsort($createArrayData);
                // golbal median:
                $medianValue            =   $this->calculate_median($createArrayData);
                // Lower median:
                $lowerQuartileArray     =   $this->findQuartileArray("<", $medianValue, $createArrayData);
                
                $lowerMedianValue       =   $this->calculate_median($lowerQuartileArray);                
                
                // Uper median:
                $upperQuartileArray     =   $this->findQuartileArray(">", $medianValue, $createArrayData);
                
                $upperMedianValue       =   $this->calculate_median($upperQuartileArray);
                // Find IQR
                $iqr                    =   ($upperMedianValue    -   $lowerMedianValue);
                
                //Find lower bound value
                $loutboundVal           =   $lowerMedianValue   -   ((1.5)*$iqr);
                $minValueArray          =   $this->findQuartileArray("<",$loutboundVal,$createArrayData, $outBound=true);
                $minValue               =   min($minValueArray['data']);
                if(isset($minValueArray['is_outbound']) && $minValueArray['is_outbound']==true){
                    $count  =   1;
                    foreach($minValueArray['data'] as $mv){
                        $outboundLayer[]     =   [$count-1, $mv];
                    }
                }
                
                //Find upper bound value
                $uoutboundVal           =   $upperMedianValue   +   ((1.5)*$iqr);
                $maxValueArray          =   $this->findQuartileArray(">",$uoutboundVal,$createArrayData, $outBound=true);
                $maxValue               =   max($maxValueArray['data']);
                if(isset($maxValueArray['is_outbound']) && $maxValueArray['is_outbound']==true){
                    $count  =   1;
                    foreach($maxValueArray['data'] as $mv){
                        $outboundLayer[]     =   [$count-1, $mv];
                    }
                }
                
                $valueToInsert  =   [$minValue,$lowerMedianValue,$medianValue,$upperMedianValue,$maxValue];
                $dataCheck[]    =   $valueToInsert;
                $categories[]   =   "$nameColumnArray[$field]";
                $count++;
                
            }// end of fields array:
            
            $finalCategory      = [implode(',', $categories)];
        } 
        
        $feedback           =   [
            'status'        =>  'success',
            'message'       =>  'Success',
            'categories'    =>  $finalCategory,
            'data'          =>  $dataCheck,
            'outboundLayer' =>  $outboundLayer,
        ];
        echo json_encode($feedback);
    }
    
    /*
     * +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     * Method is using to calculate Median Data
     * @author  :   Tanveer Qureshee
     * @data    :   11-04-2018 
     * @param   : $array from where all operation will done     
     * +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     */    
    public function calculate_median($arr) {
        if (0 === count($arr)) {
            return null;
        }

        // sort the data
        $count = count($arr);
        // get the mid-point keys (1 or 2 of them)
        $mid = floor(($count - 1) / 2);
        $keys = array_slice(array_keys($arr), $mid, (1 === $count % 2 ? 1 : 2));
        $sum = 0;
        foreach ($keys as $key) {
            $sum += $arr[$key];
        }
        return $sum / count($keys);
    }
    
    public function calculate_median_check($arr) {
        if (0 === count($arr)) {
            return null;
        }
        // sort the data
        $count  =   count($arr);
        if($count % 2==0){
            $chckDaa    =   array_keys($arr);
            echo "Mid ";
            echo $mid    =   (count($chckDaa) / 2); exit;
            
        }else{
            echo "Odd";
        }
        exit;
        // get the mid-point keys (1 or 2 of them)
        echo $mid    =   floor(($count - 1) / 2); exit;
        $keys   =   array_slice(array_keys($arr), $mid, (1 === $count % 2 ? 1 : 2));
        $sum    =   0;
        foreach ($keys as $key) {
            $sum += $arr[$key];
        }
        return $sum / count($keys);
    }
    
    /*
     * +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     * Method is using to find box plot chart quartile data
     * @author      : Tanveer Qureshee
     * @data        : 11-04-2018 
     * @param       : $conditional takes "<" or ">"
     * @param       : $median check which value to be compared
     * @param       : $array from where all operation will done    
     * $outbound    : check if the return need outbound result or not. Default value is False  
     * +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     */    
    public function findQuartileArray($conditional, $median, $array, $outbound = false) {
        $feedbackArray  =   [];
        $isOutBound     =   false;
        foreach ($array as $arrD) {
            if ($conditional == "<") {
                if ($arrD < $median) {
                    $feedbackArray[] = $arrD;
                }
            } elseif ($conditional == ">") {
                if ($arrD > $median) {
                    $feedbackArray[] = $arrD;
                }
            }
        }// end of foreach;
        if ($outbound) {
            if (isset($feedbackArray) && !empty($feedbackArray)) {
                $isOutBound     =   true;
                $feedbackData   =   [
                    'is_outbound'   =>  $isOutBound,
                    'data'          =>  $feedbackArray
                ];
                return $feedbackData;
            } else {
                $feedbackData   =   [
                    'is_outbound'   =>  $isOutBound,
                    'data'          =>  $array
                ];
                return $feedbackData;
            }
        } else {
            if (isset($feedbackArray) && !empty($feedbackArray)) {
                return $feedbackArray;
            } else {
                return $array;
            }
        }
    }

}
