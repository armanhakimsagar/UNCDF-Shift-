<?php

/* 
 * utilities method will be use for access frequently data from every where.
 * there will be custom method for custom result
 * @author: Tanveer Qureshee
 * Date: 01/01/2018
 */

//-----------------------------------------------
//Use model and all facad area
//-----------------------------------------------
use Illuminate\Support\Facades\DB;

// GET TABLE DATA BY TABLE NAME:

// GET TABLE DATA BY TABLE NAME:

function get_data_name_by_id($table,$id){
    return DB::table($table)->where('id', '=', $id)->first();
}


function get_table_data_by_table($table){
    return DB::table($table)->get();
}

function get_table_data_by_where($data){
    $query  =   DB::table($data['table']);
    if(isset($data['where']) && !empty($data['where'])){
        $query->where($data['where']);     
    }

    return $result     =     $query->get(); 

}

// COUNT ALL TABLE DATA:
function count_table_data($data){
    $query = DB::table($data['table'])
            ->select(DB::raw('count(*) as total_count'))
            ->first();
    return $query;
}

// dynamic audio count :

function training_file_count($table_name,$type_id){

    	$count_file =  count(DB::table($table_name)->where('type_id',$type_id)->get());

    	return $count_file;
}

    function getNameCountFromCSV($tableName='org_merge_data', $columnName="Q12", $percentage=2100, $select_field='id'){
        $yDataArray         =   [];
        $xDataArray         =   [];
        $listArray          =   [];
        $finalArray         =   [];
        $rowsData           =   DB::table($tableName)->get();
        foreach ($rowsData as $d) {
            $csvData        =   getIndividualElements($d->$columnName);
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
                        ->select($select_field)
                        ->whereRaw("find_in_set('$litem',$columnName)")
                        ->get();
            $finalArray[]   =   [
                'name'          =>  $litem,
                'y'         =>  count($response),

            ]; 
            
            $chengeVal  =   ((count($response)*100)/2100);
            
            $yDataArray[]   =   (float)number_format($chengeVal, 2, '.', '');
            $xDataArray[]   =   $litem;
        }// end of foreach
        $response_data = [

            'result' => $finalArray,
            'y_data' => $yDataArray,
            'x_data' => $xDataArray,
        ];
        return $response_data;

    }
    function getIndividualElements($string) {
        $elements   =   [];
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



