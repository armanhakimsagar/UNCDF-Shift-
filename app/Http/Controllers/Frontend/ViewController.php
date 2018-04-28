<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\DatabankModel\collection;
use App\DatabankModel\dataset;
use DB;


class ViewController extends Controller
{
    public function guideline_view()
    {
         Session::flash('menu', '3');
    	return view('frontend.guideline_view');
    }

    public function databank_view()
    {

        $collections = collection::all();
        
        $datasets = dataset::all();

        return view('frontend.databank_view', compact('datasets','collections'));

    }

    public function background_view()
    {
        Session::flash('menu', '1'); 
    	return view('frontend.background_view');
    }

    public function contact_us_view()
    {
        Session::flash('menu', '5');
        return view('frontend.contact_us_view');

    }

    public function data_retrieve()
    {
      $test_data = getNameCountFromCSV('org_quest_survey','Q12',2100,'id');
      dd($test_data);
    }
    public function Test()
    {
         $temp = 100*100/2100;
        // $foo = "105.102039939"; 
         $foo =  number_format((float)$temp, 2, '.', '');

         $type = gettype((float)$foo);

         echo "type of foo is = ".$type."<br>";

         echo "float number is = ".$foo;
    }
    
    
   public function databank_details($id){
       $datasets = DB::table('datasets')->where('collection_id',$id)->get();
       $collections = DB::table('collections')->where('id',$id)->get();
       return view('frontend.databank.collection_details', compact('datasets','collections'));
   }
   
   public function dataset_details($id){
       $datasets = DB::table('datasets')->where('id',$id)->get();
       $dbcollectionsdetails = DB::table('dbcollectionsdetails')->where('dataset_id',$id)->where('status',1)->get();
       $studies = DB::table('dbcollectionsdetails')->where('dataset_id',$id)->where('status',2)->get();
       $directories = DB::table('dbcollectionsdetails')->where('dataset_id',$id)->where('status',3)->get();
       $metarial_categories = DB::table('metarial_categories')->get();
       return view('frontend.databank.dataset_details', compact('datasets','dbcollectionsdetails','metarial_categories','studies','directories'));
   }

}
