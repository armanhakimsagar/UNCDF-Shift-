<?php

namespace App\Http\Controllers\Backend\GeneralPost;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\GeneralPostModel\GeneralPostModel;
use DB;
use Validator;

class GeneralPostController extends Controller

{
        public function general_post_form_view(){

        	$categories = DB::table('general_post')->get();
        	return view('backend.generalpost.general_post_form',compact('categories'));
        }

        public function general_post_view(){
        	$general_posts = DB::table('general_post_data')->orderBy('id', 'desc')->paginate(10);
        	return view('backend.generalpost.general_post_view',compact('general_posts'));
        	
        }

        public function general_post_data_insert(Request $request)
        {

        	$validator = Validator::make($request->all(), [
                        'title'             => 'required',
                        'short_description' => 'required',
                        'chart_query_method'=> 'required',
                        'post_type'         => 'required',
                        'chart_id'          => 'required',
                        
            ]);

             if ($validator->fails()) {
                return redirect('admin/general_post_form')
                                ->withErrors($validator)
                                ->withInput();
            }
        	 
        	else{

        		if ($request->hasFile('rich_editor_file')) {

                    $rich_editor_file = $_FILES['rich_editor_file']['name'];

                    // file re name

                    $enc_editor_image = time() . '.' . $rich_editor_file;

                    // Image upload method

                    move_uploaded_file($_FILES['rich_editor_file']['tmp_name'], "project/backend/generalpost/" . $rich_editor_file);
                }

                $InsertGeneralPost = new GeneralPostModel;

                $InsertGeneralPost->title               = $request->title;
                $InsertGeneralPost->chart_query_method  = $request->chart_query_method;
                if (isset($request->textarea_data)) {
                    $InsertGeneralPost->textarea_data   = $request->textarea_data;
                } else {
                    $InsertGeneralPost->textarea_data   = "";
                }
                $InsertGeneralPost->short_description   = $request->short_description;
                $InsertGeneralPost->post_type           = $request->post_type;
                $InsertGeneralPost->chart_id            = $request->chart_id;
                
                
        	}
           
             if ($request->hasFile('rich_editor_file')) {

                    $InsertGeneralPost->rich_editor_file = $enc_editor_image;
                }

                $InsertGeneralPost->save();

           
           
           return redirect('admin/general_post_view')->with('success', 'Post created successfully');
        }

        public function general_post_data_edit($id){

            $post_data = DB::table('general_post_data')->where('id', $id)->first();
            $post_types = DB::table('general_post')->get();

            return view('backend.generalpost.general_post_edit_form', compact('post_data','post_types'));
        }

        public function general_post_data_update(Request $request) {

            $all    =   $request->all();
            $title              = $request->input('title');
            $short_description  = $request->input('short_description');
            $post_type          = $request->input('post_type');
            $chart_query_method = $request->input('chart_query_method');
            $textarea_data = $request->input('textarea_data');
            $chart_id = $request->input('chart_id');
             

            $id = $request->post_edit_id;

             $upResult  =   DB::table('general_post_data')->where('id', $id)->update([
               
                'title'                   => $title,
                'short_description'       => $short_description,
                'textarea_data'           => $textarea_data,
                'post_type'               => $post_type,
                'chart_query_method'      => $chart_query_method,
                'chart_id'                => $chart_id,
            ]);
            
            /* ----------------------------------------
              || update general post rich editor
              ---------------------------------------- */



            if ($request->hasFile('rich_editor_file')) {

                $rich_editor_file = $_FILES['rich_editor_file']['name'];

                // file re name

                $enc_editor_image = time() . '.' . $rich_editor_file;

                // Image upload method

                move_uploaded_file($_FILES['rich_editor_file']['tmp_name'], "project/backend/generalpost/" . $rich_editor_file);


                $UpdateGeneralPost = new GeneralPostModel;

                $UpdateGeneralPost->rich_editor_file = $enc_editor_image;

                $UpdateGeneralPost->save();
                
                }  

            return redirect('admin/general_post_view')->with('success', 'Post Updated successfully');
           

          
            }// end of update data

             public function general_post_data_delete($id){
                   
                    $post_delete = GeneralPostModel::find($id);    
                    $post_delete->delete();
                    return redirect()->back()->with('delete_message', 'Deleted Successfully!');
            

            }
}