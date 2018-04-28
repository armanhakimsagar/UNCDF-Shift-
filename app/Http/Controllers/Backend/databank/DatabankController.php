<?php

namespace App\Http\Controllers\Backend\databank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DatabankModel\collection;
use App\DatabankModel\dataset;
use App\DatabankModel\dbcollectionsdetail;
use Validator;
use Session;
use DB;

class DatabankController extends Controller
{
    public function view(){
        $collections = DB::table('collections')->get();
        return view('backend.databank.view',compact('collections'));
    }
    public function form(){
        $collections = DB::table('collections')->get();
        $dataset_list = DB::table('datasets')->get();
        $metarial_categories = DB::table('metarial_categories')->get();
        return view('backend.databank.form', compact('dataset_list','collections','metarial_categories'));
    }
    public function CollectionInsert(Request $request){
            
            $validator = Validator::make($request->all(), [
                
                    'CollectionTitle'           => 'required',
                    'CollectionDescription'     => 'required',
                    'CollectionFile'            => 'mimes:jpeg,jpg,png|required'
                
            ]);
            if ($validator->fails()) {
            return redirect('admin/databankform')
                            ->withErrors($validator)
                            ->withInput();
            } else {
            
                $collection = new collection;
                
                $cover_image = $request->file('CollectionFile');
                // file re name
                $enc_cover_image = time() . '.' . $cover_image->getClientOriginalExtension();
                // resize file destination path
                $destinationPath = public_path('project/backend/databank/thumbsnail');

                // Image upload method
                $cover_image->move($destinationPath, $enc_cover_image);

                $collection->title                  = $_POST['CollectionTitle'];

                $collection->description            = $_POST['CollectionDescription'];

                $collection->image_path             = $enc_cover_image;

                $collection->save();
                
                
            }
            
            Session::flash('collection_msg', 'Inserted Successfully!'); 
            return redirect('/admin/databankform');
            
    }
    
    public function DatasetInsert(Request $request){
        
            $validator = Validator::make($request->all(), [
                'collection_list_for_dataset'=> 'required',
                'DatasetTitle'              => 'required',
                'DatasetReference'          => 'required',
                'DatasetYear'               => 'required',
                'DatasetCountry'            => 'required',
                'DatasetProducers'          => 'required',
                'DatasetSponsor'            => 'required',
                'DatasetCollection'         => 'required',
                'DatasetUser'               => 'required',
                'DatasetCreated'            => 'required',
                'DatasetYear'               => 'required'
                
            ]);
            if ($validator->fails()) {
            Session::flash('step_index', 1);
            return redirect('admin/databankform')
                            ->withErrors($validator)
                            ->withInput();
            } else {
            
                $dataset = new dataset;

                $dataset->dataset_title                     = $_POST['DatasetTitle'];
                $dataset->ref_id                            = $_POST['DatasetReference'];
                $dataset->year                              = $_POST['DatasetYear'];
                $dataset->country                           = $_POST['DatasetCountry'];
                $dataset->producers                         = $_POST['DatasetProducers'];
                $dataset->sponsor                           = $_POST['DatasetSponsor'];
                $dataset->collection                        = $_POST['DatasetCollection'];
                $dataset->entry_time                        = $_POST['DatasetCreated'];
                $dataset->use_type                          = $_POST['DatasetUser'];
                $dataset->collection_id                     = $_POST['collection_list_for_dataset'];;
                $dataset->save();
                
                
            }
            
            Session::flash('dataset_msg', 'Inserted Successfully!'); 
            Session::flash('step_index', 1); 
            $dataset_list = DB::table('datasets')->get();
            return redirect('admin/databankform')->with('dataset_list',$dataset_list);
            
    }
    
    
    public function MetarialInsert(Request $request){
        $validator = Validator::make($request->all(), [
                'metarial_file0'            => 'required',
                'metarial_title0'           => 'required',
                'dataset_list'              => 'required',
                'collection_list'           => 'required',
                'dataset_metarials'         => 'required'
                
            ]);
            if ($validator->fails()) {
            Session::flash('step_index', 2);
            return redirect('admin/databankform')
                            ->withErrors($validator)
                            ->withInput();
            } else {
                $loop = count($_FILES)-1;
                /* ----------------------------------------
                  || multiple file upload & insert in dbcollectionsdetail table
                ---------------------------------------- */


                    for ($i = 0; $i <= $loop; $i++) {

                        $dbcollectionsdetails = new dbcollectionsdetail;

                        $dbcollectionsdetails->posttype_id                    =  1;
                        $dbcollectionsdetails->post_title                     =  $_POST["metarial_title$i"];
                        $dbcollectionsdetails->post_description               =  1;
                        $dbcollectionsdetails->post_subtype_id                =  $request->dataset_metarials;
                        $dbcollectionsdetails->post_filetype_id               =  0;
                        $dbcollectionsdetails->fileoriginalname               =  $_FILES["metarial_file$i"]["name"];
                        $dbcollectionsdetails->file_path                      =  time().$_FILES["metarial_file$i"]["name"];
                        $dbcollectionsdetails->order                          =  1;
                        $dbcollectionsdetails->status                         =  1;
                        $dbcollectionsdetails->dataset_id                     =  $request->dataset_list;
                        $dbcollectionsdetails->collection_id                  =  $request->collection_list;
                        $dbcollectionsdetails->save();


                        move_uploaded_file($_FILES["metarial_file$i"]["tmp_name"], "project/backend/databank/" . $_FILES["metarial_file$i"]["name"]);


                    }

                    Session::flash('metarial_msg', 'Inserted Successfully!'); 
                    Session::flash('step_index', 2); 
                    return redirect('admin/databankform');
                    
            }
            
    }
    
    
    public function StudyInsert(Request $request){
        $validator = Validator::make($request->all(), [
                'study_collection_list'             => 'required',
                'study_dataset_list'                => 'required',
                'study_title0'                      => 'required',
                'study_description'                 => 'required',
                
            ]);
            if ($validator->fails()) {
            Session::flash('step_index', 3);
            return redirect('admin/databankform')
                            ->withErrors($validator)
                            ->withInput();
            } else {
                $loop = count($_FILES)-1;

                for ($i = 0; $i <= $loop; $i++) {

                    $dbcollectionsdetails = new dbcollectionsdetail;

                    $dbcollectionsdetails->posttype_id                    =  1;
                    $dbcollectionsdetails->post_title                     =  $_POST["study_title$i"];
                    $dbcollectionsdetails->post_description               =  $_POST["study_textarea_data$i"];
                    $dbcollectionsdetails->post_subtype_id                =  0;
                    $dbcollectionsdetails->post_filetype_id               =  1;
                    $dbcollectionsdetails->fileoriginalname               =  1;
                    $dbcollectionsdetails->file_path                      =  1;
                    $dbcollectionsdetails->order                          =  1;
                    $dbcollectionsdetails->status                         =  2;
                    $dbcollectionsdetails->dataset_id                     =  $request->study_dataset_list;
                    $dbcollectionsdetails->collection_id                  =  $request->study_collection_list;
                    $dbcollectionsdetails->save();

                }

                Session::flash('study_msg', 'Inserted Successfully!'); 
                Session::flash('step_index', 3); 
                return redirect('admin/databankform');
                
         }
        
    }
    
    public function DirectoryInsert(Request $request){
        $validator = Validator::make($request->all(), [
            'directory_collection_list'             => 'required',
            'directory_dataset_list'                => 'required',
            'directory_title0'                      => 'required',
            'directory_textarea_data0'              => 'required',

        ]);
        if ($validator->fails()) {
        Session::flash('step_index', 4);
        return redirect('admin/databankform')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $loop = count($_FILES)-1;
            for ($i = 0; $i <= $loop; $i++) {

                $dbcollectionsdetails = new dbcollectionsdetail;

                $dbcollectionsdetails->posttype_id                    =  1;
                $dbcollectionsdetails->post_title                     =  $_POST["directory_title$i"];
                $dbcollectionsdetails->post_description               =  $_POST["directory_textarea_data$i"];
                $dbcollectionsdetails->post_subtype_id                =  0;
                $dbcollectionsdetails->post_filetype_id               =  2;
                $dbcollectionsdetails->fileoriginalname               =  1;
                $dbcollectionsdetails->file_path                      =  1;
                $dbcollectionsdetails->order                          =  1;
                $dbcollectionsdetails->status                         =  3;
                $dbcollectionsdetails->dataset_id                     =  $request->directory_dataset_list;
                $dbcollectionsdetails->collection_id                  =  $request->directory_collection_list;
                $dbcollectionsdetails->save();

            }

            Session::flash('directory_msg', 'Inserted Successfully!'); 
            Session::flash('step_index', 4); 
            return redirect('admin/databankform');
        
        }
    }
    
    
    public function DatasetEdit($id){
        
        $collections = DB::table('collections')->where('id',$id)->get();
        $allcollections = DB::table('collections')->get();
        $datasets = DB::table('datasets')->where('collection_id',$id)->get();
        $alldatasets = DB::table('datasets')->get();
        $allcollections = collection::all();
        $metarial_categories = DB::table('metarial_categories')->get();
        $single_metarials = DB::table('dbcollectionsdetails')->where('post_filetype_id',0)->where('collection_id',$id)->get();
        $single_studies = DB::table('dbcollectionsdetails')->where('post_filetype_id',1)->where('collection_id',$id)->get();
        $single_directories = DB::table('dbcollectionsdetails')->where('post_filetype_id',2)->where('collection_id',$id)->get();
        return view('backend.databank.edit',compact('collections','datasets','single_metarials','alldatasets','allcollections','metarial_categories','single_studies','alldatasets','single_directories'));
    
        
    }
    
    
    public function SpecficDataset($id){
       $single_datasets = DB::table('datasets')->where('id',$id)->first();
       return json_encode($single_datasets);
    }
    
    public function SpecficMetarial($id){
       $SpecficMetarial = DB::table('dbcollectionsdetails')->where('id',$id)->first();
       return json_encode($SpecficMetarial);
    }
    
    public function SpecficStudy($id){
       $SpecficMetarial = DB::table('dbcollectionsdetails')->where('id',$id)->first();
       return json_encode($SpecficMetarial);
    }
    public function SpecficDirectory($id){
       $SpecficDirectory = DB::table('dbcollectionsdetails')->where('id',$id)->first();
       return json_encode($SpecficDirectory);
    } 
    
    
    public function CollectionUpdate(Request $request){
        
            $validator = Validator::make($request->all(), [
                
                    'CollectionTitle'           => 'required',
                    'CollectionDescription'     => 'required'
                
            ]);
            if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                            ->withInput();
            } else {
            
                $collection = collection::find($request->old_collection_id);
                
                if($request->file('CollectionFile') != ""){
                    
                    $cover_image = $request->file('CollectionFile');
                    // file re name
                    $enc_cover_image = time() . '.' . $cover_image->getClientOriginalExtension();
                    // resize file destination path
                    $destinationPath = public_path('project/backend/databank/thumbsnail');

                    // Image upload method
                    $cover_image->move($destinationPath, $enc_cover_image);
                    $collection->image_path             = $enc_cover_image;
                }
                $collection->title                  = $_POST['CollectionTitle'];

                $collection->description            = $_POST['CollectionDescription'];

                

                $collection->save();
                
                
            }
            
            Session::flash('collection_msg', 'Updated Successfully!'); 
            return redirect()->back();
            
    }
    
     public function DatasetUpdate(Request $request){
                
            $validator = Validator::make($request->all(), [
                'collection_list_for_dataset'=> 'required',
                'DatasetTitle'              => 'required',
                'DatasetReference'          => 'required',
                'DatasetYear'               => 'required',
                'DatasetCountry'            => 'required',
                'DatasetProducers'          => 'required',
                'DatasetSponsor'            => 'required',
                'DatasetCollection'         => 'required',
                'DatasetUser'               => 'required',
                'DatasetCreated'            => 'required',
                'DatasetYear'               => 'required'
                
            ]);
            if ($validator->fails()) {
            Session::flash('step_index', 1);
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            } else {
                
                if($request->old_dataset_id != ""){
                    $dataset = dataset::find($request->old_dataset_id);
                }else{
                    $dataset = new dataset;
                }
                $dataset->dataset_title                     = $_POST['DatasetTitle'];
                $dataset->ref_id                            = $_POST['DatasetReference'];
                $dataset->year                              = $_POST['DatasetYear'];
                $dataset->country                           = $_POST['DatasetCountry'];
                $dataset->producers                         = $_POST['DatasetProducers'];
                $dataset->sponsor                           = $_POST['DatasetSponsor'];
                $dataset->collection                        = $_POST['DatasetCollection'];
                $dataset->entry_time                        = $_POST['DatasetCreated'];
                $dataset->use_type                          = $_POST['DatasetUser'];
                $dataset->collection_id                     = $_POST['collection_list_for_dataset'];;
                $dataset->save();
                
                
            }
            
            Session::flash('dataset_msg', 'Updated Successfully!'); 
            Session::flash('step_index', 1); 
            $dataset_list = DB::table('datasets')->get();
            return redirect()->back()->with('dataset_list',$dataset_list);
         
     }
     
     public function MetarialUpdate(Request $request){
         
            $validator = Validator::make($request->all(), [
                  'metarial_file0'            => 'required',
                  'metarial_title0'           => 'required',
                  'dataset_list'              => 'required',
                  'collection_list'           => 'required',
                  'dataset_metarials'         => 'required'

              ]);
              if ($validator->fails()) {
              Session::flash('step_index', 2);
              return redirect()->back()
                              ->withErrors($validator)
                              ->withInput();
              } else {
                /* ----------------------------------------
                  || multiple file upload & insert in dbcollectionsdetail table
                ---------------------------------------- */

                
                if($request->old_dbcollectionsdetail_id != ""){
                    $dbcollectionsdetails = dbcollectionsdetail::find($request->old_dbcollectionsdetail_id);
                }else{
                    $dbcollectionsdetails = new dbcollectionsdetail;
                }
                

                $dbcollectionsdetails->posttype_id                    =  1;
                $dbcollectionsdetails->post_title                     =  $_POST["metarial_title0"];
                $dbcollectionsdetails->post_description               =  1;
                $dbcollectionsdetails->post_subtype_id                =  $request->dataset_metarials;
                $dbcollectionsdetails->post_filetype_id               =  0;
                $dbcollectionsdetails->fileoriginalname               =  $_FILES["metarial_file0"]["name"];
                $dbcollectionsdetails->file_path                      =  time().$_FILES["metarial_file0"]["name"];
                $dbcollectionsdetails->order                          =  1;
                $dbcollectionsdetails->status                         =  1;
                $dbcollectionsdetails->dataset_id                     =  $request->dataset_list;
                $dbcollectionsdetails->collection_id                  =  $request->collection_list;
                $dbcollectionsdetails->save();


                move_uploaded_file($_FILES["metarial_file0"]["tmp_name"], "project/backend/databank/" . $_FILES["metarial_file0"]["name"]);

                Session::flash('metarial_msg', 'Updated Successfully!'); 
                Session::flash('step_index', 2); 
                return redirect()->back();
                    
            }
    }
    
    public function StudyUpdate(Request $request){
            
            $validator = Validator::make($request->all(), [
                'study_collection_list'             => 'required',
                'study_dataset_list'                => 'required',
                'study_title0'                      => 'required'

            ]);
            if ($validator->fails()) {
            Session::flash('step_index', 3);
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            } else {
                if($request->old_studydetail_id != ""){
                    $dbcollectionsdetails = dbcollectionsdetail::find($request->old_studydetail_id);
                }else{
                    $dbcollectionsdetails = new dbcollectionsdetail;
                }

                $dbcollectionsdetails->posttype_id                    =  1;
                $dbcollectionsdetails->post_title                     =  $_POST["study_title0"];
                $dbcollectionsdetails->post_description               =  $_POST["study_textarea_data0"];
                $dbcollectionsdetails->post_subtype_id                =  0;
                $dbcollectionsdetails->post_filetype_id               =  1;
                $dbcollectionsdetails->fileoriginalname               =  1;
                $dbcollectionsdetails->file_path                      =  1;
                $dbcollectionsdetails->order                          =  1;
                $dbcollectionsdetails->status                         =  2;
                $dbcollectionsdetails->dataset_id                     =  $request->study_dataset_list;
                $dbcollectionsdetails->collection_id                  =  $request->study_collection_list;
                $dbcollectionsdetails->save();
                    
                Session::flash('study_msg', 'Updated Successfully!'); 
                Session::flash('step_index', 3); 
                return redirect()->back();
            }
        }
        
    
        
       public function DirectoryUpdate(Request $request){
            $validator = Validator::make($request->all(), [
                'directory_collection_list'             => 'required',
                'directory_dataset_list'                => 'required',
                'directory_title0'                      => 'required',

            ]);
            if ($validator->fails()) {
            Session::flash('step_index', 4);
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            } else {

                if($request->old_directorydetail_id != ""){
                    $dbcollectionsdetails = dbcollectionsdetail::find($request->old_directorydetail_id);
                }else{
                    $dbcollectionsdetails = new dbcollectionsdetail;
                }

                $dbcollectionsdetails->posttype_id                    =  1;
                $dbcollectionsdetails->post_title                     =  $_POST["directory_title0"];
                $dbcollectionsdetails->post_description               =  $_POST["directory_textarea_data0"];
                $dbcollectionsdetails->post_subtype_id                =  0;
                $dbcollectionsdetails->post_filetype_id               =  2;
                $dbcollectionsdetails->fileoriginalname               =  1;
                $dbcollectionsdetails->file_path                      =  1;
                $dbcollectionsdetails->order                          =  1;
                $dbcollectionsdetails->status                         =  3;
                $dbcollectionsdetails->dataset_id                     =  $request->directory_dataset_list;
                $dbcollectionsdetails->collection_id                  =  $request->directory_collection_list;
                $dbcollectionsdetails->save();

            }

            Session::flash('directory_msg', 'Updated Successfully!'); 
            Session::flash('step_index', 4); 
            return redirect()->back();

       }
}
