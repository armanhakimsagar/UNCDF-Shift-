<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CsvuploaderController extends Controller {

    public function csvToArray($filename = '', $delimiter = ',') {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        $count  =   1;
        if (($handle = fopen($filename, 'r')) !== false) {
            while ($row = fgetcsv($handle)) {
                print "<pre>";
                print_r($row);
                print "</pre>";
                exit;
                
                if($count==1){
                    $count++;
                    continue;
                }
                $data[]     =     $row;
                
            }
            fclose($handle);
        }

        return $data;
    } // end of method
    
    public function importCsv() {
        $file = public_path('file/20180228_Dataset.csv');
        $customerArr = $this->csvToArray($file);
        print "<pre>";
        print_r($customerArr);
        print "</pre>";
        exit;
        
        for ($i = 0; $i < count($customerArr); $i ++) {
            User::firstOrCreate($customerArr[$i]);
        }

        return 'Jobi done or what ever';
    }// end of method;
    
    public function csvCorrection(Request $request){
        $last_id    =   "No Issue";
        // csv data table:
        $rowData            =   DB::table('org_quest_survey')->offset($request->offset_id)->limit(400)->get();        
        // match data table:
        $match_data     =   DB::table('location_types')->get();
        //csv column name:
        $dataObj            =   'LOCATION_TYPE';
        
        // match table column name:
        $mappingObj         =   'name';
        
        $updatecount        =   0;
        
        foreach($rowData as $data){
            $response_data  =   $this->csvdatamapping($data, $match_data, $dataObj, $mappingObj);
            DB::table('org_quest_survey')
            ->where('ID', $data->ID)
            ->update([$dataObj => $response_data->$dataObj]);
            
            $updatecount++;
            $last_id    =   $data->ID;
        }
        
        echo "<h1>Total Update Row: ".$updatecount." Last ID:". $last_id."</h1>";
    }
    
    public function csvdatamapping($csvData, $mappingData, $dataObj, $mappingObj){
        $check  =   false;        
        foreach($mappingData as $mapping){
            if(strtolower($mapping->$mappingObj) == strtolower($csvData->$dataObj)){
                $csvData->$dataObj     =    $mapping->id;
                $check  =   true;
            }         
        }// end of foreach
        if(!$check){
            $csvData->$dataObj = 3;
        }
        return $csvData;
    }
    public function addLocationIds(Request $request){
        $district_data    =   DB::table('location_bbs2011')->where('loc_type','=','DT')->get();
        $survey_data      =   DB::table('org_quest_survey')->offset($request->offset_id)->limit(400)->get();
        
        $already_updated    =   [];
        
        foreach($survey_data as $dis){
            $dis_check  = strtolower(trim($dis->DISTRICT));
            foreach($district_data as $d){
                if(!in_array($dis_check, $already_updated)){                    
                    if($dis_check == str_replace("'", "", strtolower(trim($d->loc_name_en)))){
                        $update_id  =   $d->district;
                        $already_updated[]  =   $dis_check;
                        DB::table('org_quest_survey')
                            ->where('DISTRICT', $dis_check)
                            ->update(['DISTRICT' => $update_id]);                    }
                }else{
                    continue;
                }
            }// end of district
        }// end of main foreach
        print "<pre>";
        print_r($already_updated);
        print "</pre>";
        exit;
        
    }
    
    public function updateUpazilaName(Request $request){
        $upazila_data    =   DB::table('location_bbs2011')->where('loc_type','=','UP')->where('district', '=' ,$request->district)->where('loc_name_en', '=' ,$request->loc_name_en)->first();
        
        $update_id       =   $upazila_data->upazila;
                        DB::table('org_quest_survey')
                            ->where('DISTRICT', $request->district)
                            ->where('Sub_District', $request->loc_name_en)
                            ->update(['Sub_District' => $update_id]);    
    }

    public function showLocationIds(){
        $survey_data      =   DB::table('org_quest_survey')->offset(0)->limit(2500)->get();
        ?>
        <table width="100%" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <th>id</th>
                <th>District Name</th>
                <th>Upazila Name</th>
            </tr>
            <?php foreach($survey_data as $data){  ?>
            <tr>
                <th><?php echo $data->ID; ?></th>
                <th><?php echo $data->DISTRICT; ?></th>
                <th><?php echo $data->Sub_District; ?></th>
            </tr>
            <?php } ?>
        </table>
        <?php
    }
    
    public function seperateColumnValue(Request $request){
        // csv data table:        
        $getdataParam   =   [
            'table'     =>  "org_quest_latest",
            'offset'    =>  $request->offset_id,
            'limit'     =>  "100",
        ]; 
        $update_id  =   0;
        $response_data  = $this->getTableDataByLimit($getdataParam);        
        foreach($response_data as $data){
            $filled     =   [];
            $update_id  =   $data->ID;
            if(isset($data->Q33_1) && !empty($data->Q33_1)){
                $filled[]   =   $data->Q33_1;
            }
            if(isset($data->Q33_2) && !empty($data->Q33_2)){
                $filled[]   =   $data->Q33_2;
            }
            if(isset($data->Q33_3) && !empty($data->Q33_3)){
                $filled[]   =   $data->Q33_3;
            }
            if(isset($data->Q33_4) && !empty($data->Q33_4)){
                $filled[]   =   $data->Q33_4;
            }
            if(isset($data->Q33_5) && !empty($data->Q33_5)){
                $filled[]   =   $data->Q33_5;
            }
            if(isset($data->Q33_6) && !empty($data->Q33_6)){
                $filled[]   =   $data->Q33_6;
            }
            if(isset($data->Q33_7) && !empty($data->Q33_7)){
                $filled[]   =   $data->Q33_7;
            }
            if(isset($data->Q33_8) && !empty($data->Q33_8)){
                $filled[]   =   $data->Q33_8;
            }
            $q    = implode(",", $filled);
            DB::table($getdataParam['table'])
            ->where('ID', $update_id)
            ->update(['Q33' => $q]);
            
        }
        echo "Last ID:".$update_id;
        
    }
    
    
    public function getTableDataByLimit($tableParam){
        return $rowData    =   DB::table($tableParam['table'])->offset($tableParam['offset'])->limit($tableParam['limit'])->get(); 
    }
    
    public function insertTempTable(Request $request){
        $tableParam   =   [
            'table'     =>  "org_merge_data",
            'offset'    =>  $request->offset_id,
            'limit'     =>  "2200",
        ];
        $res_data    =   DB::table($tableParam['table'])->offset($tableParam['offset'])->limit($tableParam['limit'])->get();
        $column =   $request->column_name;
        foreach($res_data as $d){
                $insert_data    =   [
                    'location_type' => (($d->LOCATION_TYPE=='Urban')? 1:2),
                    'gender'        => (($d->Q4=='Male')? 1:2),
                    'var_column'    => $d->$column,
                ];
                
                DB::table('temp_map_chart_check')->insert($insert_data);
            
        }
        
    }
    
    public function getNameCountFromCSV($tableName='org_merge_data', $columnName    =   "Q12"){
        $listArray          =   [];
        $finalArray         =   [];
        $rowsData           =   DB::table($tableName)->get();
        foreach ($rowsData as $d) {
            $csvData        =   $this->getIndividualElements($d->$columnName);
            if (isset($csvData) && !empty($csvData)) {
                foreach ($csvData as $csvElements) {
                    if (!in_array($csvElements, $listArray)) {
                        $listArray[]    =   $csvElements;
                    }// end of in array check
                }// end of csv for each     
            }
        }// end of table for each
        foreach ($listArray as $litem) {
            $response   =   DB::table($tableName)
                        ->select('id')
                        ->whereRaw("find_in_set('$litem',$columnName)")
                        ->get();
            $finalArray[]   =   [
                'name'          =>  $litem,
                'total'         =>  count($response),
                'percentage'    =>  number_format((float)((100*count($response))/2100), 2, '.', ''),
            ];            
        }
        return $finalArray;
        
    }
    public function getIndividualElements($string) {
        $elements       =   [];
        if (strpos($string, ')') !== false) {
            // Just to ensure spliting using ),
            $string     =   str_replace(') ,', '),', $string);
            $parts      =   explode('),', $string);
            if (!empty($parts)) {
                foreach ($parts as $part) {
                    $partdiff = explode('(', $part);
                    $subparts = explode(',', $partdiff[0]);
                    if (!empty($partdiff[1])) {
                        $parenthesis = '(' . $partdiff[1];
                        end($subparts);
                        $endKey = key($subparts);
                        reset($subparts);
                        $subparts[$endKey] .= $parenthesis;
                    }
                    $elements = array_merge($elements, $subparts);
                }
            }
        } else {
            $elements = explode(',', $string);
        }
        return $elements;
    }
    
    public function updateSortingValue(Request $request){
        
        // csv data table:        
        $getdataParam   =   [
            'table'     =>  "org_quest_survey",
            'offset'    =>  $request->offset_id,
            'limit'     =>  "100",
        ]; 
        $update_id      =   0;
        $response_data  = $this->getTableDataByLimit($getdataParam);        
        foreach($response_data as $data){
            $updateCheck    =   false;
            $update_id  =   $data->ID;
            if(isset($data->Bus_Exp_2) && !empty($data->Bus_Exp_2) && $data->Bus_Exp_2=='11-20 years'){
                $updateCheck    =   true;
                $sort_by   =   5;
            }
            if(isset($data->Bus_Exp_2) && !empty($data->Bus_Exp_2) && $data->Bus_Exp_2=='2-5 years'){
                $updateCheck    =   true;
                $sort_by   =   3;
            }
            if(isset($data->Bus_Exp_2) && !empty($data->Bus_Exp_2) && $data->Bus_Exp_2=='6 months-1 year'){
                $updateCheck    =   true;
                $sort_by   =   2;
            }
            if(isset($data->Bus_Exp_2) && !empty($data->Bus_Exp_2) && $data->Bus_Exp_2=='6-10 years'){
                $updateCheck    =   true;
                $sort_by   =   4;
            }
            if(isset($data->Bus_Exp_2) && !empty($data->Bus_Exp_2) && $data->Bus_Exp_2=='<6 months'){
                $sort_by   =   1;
            }
            if(isset($data->Bus_Exp_2) && !empty($data->Bus_Exp_2) && $data->Bus_Exp_2=='>20 years'){
                $updateCheck    =   true;
                $sort_by   =   6;
            }
            if($updateCheck){
                DB::table($getdataParam['table'])
                ->where('ID', $update_id)
                ->update(['sort_by' => $sort_by]);
            }
        }
        echo "Last ID:".$update_id;
        
    }
        
}
