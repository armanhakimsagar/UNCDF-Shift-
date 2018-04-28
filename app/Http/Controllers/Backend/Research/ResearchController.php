<?php

namespace App\Http\Controllers\Backend\Research;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\ResearchModel\Research;
use App\ResearchModel\Category;
use App\ResearchModel\Research_file_detail;
use DB;
use File;
use Session;

class ResearchController extends Controller {

    // research form data view

    public function DataView() {

        $research = DB::table('researches')->orderBy('id', 'desc')->get();

        return view('backend.research.research_view', compact('research'));
    }

    // research form form view

    public function Research_Form() {
        $Category_data = Category::all();
        return view('backend.research.research_form', compact('Category_data'));
    }

    // research form validation

    public function Validation(Request $request) {
        $validator = Validator::make($request->all(), [
                    'title'             => 'required',
                    'category'          => 'required',
                    'short_description' => 'required',
                    'status'            => 'required',
                    'short_tag'         => 'required',
                    'cover_image'       => 'mimes:jpeg,jpg,png|required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/research_form')
                            ->withErrors($validator)
                            ->withInput();
        } else {

            /* ----------------------------------------
              || research cover image upload
              ---------------------------------------- */

            if ($request->hasFile('cover_image')) {

                $cover_image = $request->file('cover_image');
                // file re name
                $enc_cover_image = time() . '.' . $cover_image->getClientOriginalExtension();
                // resize file destination path
                $destinationPath = public_path('project/backend/research/cover_image');

                // Image upload method
                $cover_image->move($destinationPath, $enc_cover_image);
            }

            
            /* ----------------------------------------
              || research rich editor data upload
              ---------------------------------------- */



            if ($request->hasFile('rich_editor_file')) {

                $rich_editor_file = $_FILES['rich_editor_file']['name'];

                // file re name

                $enc_editor_image = time() . '.' . $rich_editor_file;

                // Image upload method

                move_uploaded_file($_FILES['rich_editor_file']['tmp_name'], "project/backend/research/rich_editor_file/" . $rich_editor_file);
            }


            /* ----------------------------------------
              || research form insert in researches table
              ---------------------------------------- */


            $InsertResearh = new Research;

            $InsertResearh->title               = $request->title;
            $InsertResearh->category            = $request->category;
            if (isset($request->textarea_data)) {
                $InsertResearh->textarea_data   = $request->textarea_data;
            } else {
                $InsertResearh->textarea_data   = "";
            }
            $InsertResearh->short_description   = $request->short_description;
            $InsertResearh->status              = $request->status;
            $InsertResearh->short_tag           = $request->short_tag;
            $InsertResearh->cover_image         = $enc_cover_image;
            $InsertResearh->remember_token      = $request->remember_token;
            


            if ($request->hasFile('rich_editor_file')) {

                $InsertResearh->rich_editor_file = $enc_editor_image;
            }

            $InsertResearh->save();




            /* ----------------------------------------
              || research file insert in research_file_details table
              || get last insert id number
              ---------------------------------------- */


            $last_id = $InsertResearh->id;



            $files = $request->file('files');


            $loop = count($files) - 1;


            /* ----------------------------------------
              || multiple file upload & insert in Research_file_detail table
              ---------------------------------------- */


            for ($i = 0; $i <= $loop; $i++) {
                
                $Research_file_detail                       = new Research_file_detail;

                $file                                       = time() . "." . $_FILES['files']['name'][$i];

                $Research_file_detail->type_id              = '1';

                $Research_file_detail->post_id              = $last_id;

                $Research_file_detail->title                = 'default title';

                $Research_file_detail->path                 = $file;

                $Research_file_detail->short_description    = 'default description';

                $Research_file_detail->save();

                move_uploaded_file($_FILES['files']['tmp_name'][$i], "project/backend/research/file/" . $file);
            }


            /* ----------------------------------------
              || youtube insert
              ---------------------------------------- */
            
            
            if($request->research_youtube != ""){
                    
                $Research_file_detail                       = new Research_file_detail;

                $file                                       = $request->research_youtube;

                $Research_file_detail->type_id              = '5';

                $Research_file_detail->post_id              = $last_id;

                $Research_file_detail->title                = 'default title';

                $Research_file_detail->path                 = $file;

                $Research_file_detail->short_description    = 'default description';

                $Research_file_detail->save();
            }
            
            
            /* ----------------------------------------
              || multiple audio file upload & insert
              ---------------------------------------- */



            $audios = $request->file('audios');


            $loop = count($audios) - 1;

            for ($i = 0; $i <= $loop; $i++) {

                $Research_file_detail                       = new Research_file_detail;

                $audio                                      = time() . "." . $_FILES['audios']['name'][$i];

                $Research_file_detail->type_id              = '4';

                $Research_file_detail->post_id              = $last_id;

                $Research_file_detail->title                = 'default title';

                $Research_file_detail->path                 = $audio;

                $Research_file_detail->short_description    = 'default description';

                $Research_file_detail->save();

                move_uploaded_file($_FILES['audios']['tmp_name'][$i], "project/backend/research/audio/" . $audio);
            }




            /* ----------------------------------------
              || multiple video file upload & insert
              ---------------------------------------- */




            $videos = $request->file('videos');


            $loop = count($videos) - 1;


            for ($i = 0; $i <= $loop; $i++) {

                $Research_file_detail                       = new Research_file_detail;

                $video = time() . "." . $_FILES['videos']['name'][$i];

                $Research_file_detail->type_id              = '3';

                $Research_file_detail->post_id              = $last_id;

                $Research_file_detail->title                = 'default title';

                $Research_file_detail->path                 = $video;

                $Research_file_detail->short_description    = 'default description';

                $Research_file_detail->save();


                move_uploaded_file($_FILES['videos']['tmp_name'][$i], "project/backend/research/video/" . $video);
            }




            Session::flash('insert_msg', 'Inserted Successfully!'); 
            return redirect('/admin/research');
        }
    }

    /* ----------------------------------------
      || edit research post
      ---------------------------------------- */

    public function Research_Edit($id) {

        $research_edit = Research::find($id);



        $Research_file = DB::select("SELECT * FROM research_file_details where post_id = '$id' && type_id='1'");


        $Research_audio = DB::select("SELECT * FROM research_file_details where post_id = '$id' && type_id='4'");


        $Research_video = DB::select("SELECT * FROM research_file_details where post_id = '$id' && type_id='3'");
        
        $Research_youtube = DB::select("SELECT * FROM research_file_details where post_id = '$id' && type_id='5'");
        
        
        $Category_data = Category::all();


        return view('backend.research.research_edit_form', compact('research_edit', 'Research_file', 'Research_audio', 'Research_video', 'Category_data','Research_youtube'));
    }

    /* ----------------------------------------
      //update research post
      ---------------------------------------- */

    public function Research_Update(Request $request) {


       

        // ------------ update data in database


        $UpdateResearch = Research::find($request->old_id);

        $last_id = $UpdateResearch->id;

        if (isset($request->title)) {
            $UpdateResearch->title = $request->title;
        }
        if (isset($request->category)) {
            $UpdateResearch->category = $request->category;
        }
        if (isset($request->textarea_data)) {
            $UpdateResearch->textarea_data = $request->textarea_data;
        }
        if (isset($request->short_description)) {
            $UpdateResearch->short_description = $request->short_description;
        }
        if (isset($request->short_tag)) {
            $UpdateResearch->short_tag = $request->short_tag;
        }

        $UpdateResearch->save();


        /* ----------------------------------------
          || update cover image
          ---------------------------------------- */

        if ($request->hasFile('cover_image')) {

            $cover_image = time() . "." .$_FILES['cover_image']['name'];


            // resize file destination path
            $destinationPath = public_path('project/backend/research/cover_image/');



            // Image upload method
            move_uploaded_file($_FILES['cover_image']['tmp_name'], "project/backend/research/cover_image/" . $cover_image);


            $UpdateResearch->cover_image = $cover_image;

            $UpdateResearch->save();
        }


        
        
        /* ----------------------------------------
          || update research_youtube
         ---------------------------------------- */
        
        
        if($request->research_youtube != ""){
            
            Research_file_detail::where('post_id',$request->old_id)
                ->where('type_id',5)
                ->update(['path' => $request->research_youtube]);
            
        }else{
            
            Research_file_detail::where('post_id',$request->old_id)
                ->where('type_id',5)
                ->update(['path' => ""]);
         }
        
        /* ----------------------------------------
          || update research rich editor
          ---------------------------------------- */



        if ($request->hasFile('rich_editor_file')) {

            $rich_editor_file = $_FILES['rich_editor_file']['name'];

            // file re name

            $enc_editor_image = time() . '.' . $rich_editor_file;

            // Image upload method

            move_uploaded_file($_FILES['rich_editor_file']['tmp_name'], "project/backend/research/rich_editor_file/" . $rich_editor_file);


            $Research = new Research;

            $UpdateResearch->rich_editor_file = $enc_editor_image;

            $UpdateResearch->save();
        }


        //---- upload files


        if ($request->file('files') != "") {

            $files = $request->file('files');


            $loop = count($files) - 1;


            /* ----------------------------------------
              || multiple file upload & insert in Research_file_detail table
              ---------------------------------------- */


            for ($i = 0; $i <= $loop; $i++) {
                $Research_file_detail                       = new Research_file_detail;

                $file = time() . "." . $_FILES['files']['name'][$i];

                $Research_file_detail->type_id              = '1';

                $Research_file_detail->post_id              = $last_id;

                $Research_file_detail->title                = 'default title';

                $Research_file_detail->path                 = $file;

                $Research_file_detail->short_description    = 'default description';

                $Research_file_detail->save();


                move_uploaded_file($_FILES['files']['tmp_name'][$i], "project/backend/research/file/" . $file);
            }
        }


        /* ----------------------------------------
          || multiple audio file upload & insert
          ---------------------------------------- */


        if ($request->file('audio') != "") {

            $audios = $request->file('audio');

            $loop = count($audios) - 1;

            for ($i = 0; $i <= $loop; $i++) {

                $Research_file_detail                       = new Research_file_detail;

                $audio = time() . "." . $_FILES['audio']['name'][$i];

                $Research_file_detail->type_id              = '4';

                $Research_file_detail->post_id              = $last_id;

                $Research_file_detail->title                = 'default title';

                $Research_file_detail->path                 = $audio;

                $Research_file_detail->short_description    = 'default description';

                $Research_file_detail->save();

                move_uploaded_file($_FILES['audio']['tmp_name'][$i], "project/backend/research/audio/" . $audio);
            }
        }


        /* ----------------------------------------
          || multiple video file upload & insert
          ---------------------------------------- */


        if ($request->file('video') != "") {

            $videos = $request->file('video');

            $loop = count($videos) - 1;

            for ($i = 0; $i <= $loop; $i++) {


                $Research_file_detail                       = new Research_file_detail;

                $video = time() . "." . $_FILES['video']['name'][$i];

                $Research_file_detail->type_id              = '3';

                $Research_file_detail->post_id              = $last_id;

                $Research_file_detail->title                = 'default title';

                $Research_file_detail->path                 = $video;

                $Research_file_detail->short_description = 'default description';

                $Research_file_detail->save();


                move_uploaded_file($_FILES['video']['tmp_name'][$i], "project/backend/research/video/" . $video);
            }
        }



        // -- view in retrun page
        Session::flash('update_msg', 'Updated Successfully!');

        $research = DB::table('researches')->orderBy('id', 'desc')->paginate(10);

        return redirect('admin/research');
    }

    /* ----------------------------------------
    || research delete method
    ---------------------------------------- */
    public function research_delete($id){

        $DeleteResearch_data = Research::find($id);

        $DeleteResearch_file = Research_file_detail::where('post_id', $id)
                ->orderBy('id', 'desc')
                ->take(10)
                ->get();

        // checking the file type by type id
        
        foreach ($DeleteResearch_file as $d_file) {

            if ($d_file->type_id == 1) {
                unlink(public_path() . '/project/backend/research/file/' . $d_file->path);
            }

            if ($d_file->type_id == 2) {
                unlink(public_path() . '/project/backend/research/cover_image/' . $d_file->path);
            }

            if ($d_file->type_id == 3) {
                unlink(public_path() . '/project/backend/research/video/' . $d_file->path);
            }

            if ($d_file->type_id == 4) {
                unlink(public_path() . '/project/backend/research/audio/' . $d_file->path);
            }
        }



        DB::table('research_file_details')->where('post_id', $id)->delete();
        DB::table('researches')->where('id', $id)->delete();

        return redirect()->back()->with('delete_message', 'Deleted Successfully!');
    }

    
    /* ----------------------------------------
    || research sweet alert ajax delete
    ---------------------------------------- */
    public function research_ajax_delete($id) {

        $DeleteResearch = Research_file_detail::find($id);

        $Research = Research::find($id);


        if (isset($DeleteResearch)) {

            $file = $DeleteResearch->path;
            $type = $DeleteResearch->type_id;
        }
        if (isset($Research)) {

            $cover_image = $Research->cover_image;
        }


        if (isset($type) && $type == 1) {

            $DeleteResearch->delete();

            unlink("project/backend/research/file/" . $file);
        } elseif (isset($type) && $type == 2) {

            $DeleteResearch->delete();

            unlink("project/backend/research/picture/" . $file);
        } elseif (isset($type) && $type == 3) {

            $DeleteResearch->delete();

            unlink("project/backend/research/video/" . $file);
        } elseif (isset($type) && $type == 4) {

            $DeleteResearch->delete();


            unlink("project/backend/research/audio/" . $file);
        } elseif (isset($cover_image)) {

            $Research->delete();

            unlink(public_path('project/backend/research/cover_image/' . $cover_image));
        }


    }

}
