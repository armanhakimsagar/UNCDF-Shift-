<?php

namespace App\Http\Controllers\Backend\training;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TrainingModel\training;
use App\TrainingModel\training_file_detail;
use Validator;
use DB;
use File;
use Session;

class training_controller extends Controller {

    /* ----------------------------------------
    || training form view for insert
    ---------------------------------------- */
    public function form_view() {

        return view('backend.training.form_view');
    }

    
    /* ----------------------------------------
    || training all data view
    ---------------------------------------- */
    
    public function training_view() {

        $training = DB::table('trainings')->orderBy('id', 'desc')->get();
        return view('backend.training.training_view', compact('training'));
    }

    public function training_insert(Request $request) {

        $validator = Validator::make($request->all(), [
                    'title'             => 'required',
                    'category_id'       => 'required',
                    'short_description' => 'required',
                    'paid'              => 'required',
                    'cover_image'       => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/training')
                            ->withErrors($validator)
                            ->withInput();
        } else {

            /* ----------------------------------------
              || training form insert in training table
              ---------------------------------------- */


            $training_controller = new training;
            

            $training_controller->title                 = $request->title;
            $training_controller->category_id           = $request->category_id;
            $training_controller->textarea_data         = $request->textarea_data;
            $training_controller->short_description     = $request->short_description;
            $training_controller->paid                  = $request->paid;


            if ($request->hasFile('rich_editor_file')) {

                $training_controller->rich_editor_file = $_FILES['rich_editor_file']['name'];
            }
            
            // cover image upload
            $cover_image = time().$_FILES['cover_image']['name'];
            
            $training_controller->cover_image  = $cover_image;

            
            move_uploaded_file($_FILES['cover_image']['tmp_name'], "project/backend/training/cover_image/" .$cover_image);

            $training_controller->save();

            $last_id = $training_controller->id;


            // training file upload
            
            if ($request->hasFile('training_file')) {

                $files = $request->file('training_file');

                $loop = count($files) - 1;


                /* ----------------------------------------
                  || multiple file upload & insert in training_file_detail table
                  ---------------------------------------- */


                for ($i = 0; $i <= $loop; $i++) {
                    $training_file_detail               = new training_file_detail;

                    $training_file_detail->type_id      = '1';

                    $training_file_detail->training_id  = $last_id;

                    $training_file_detail->file         = time() . "." .$_FILES['training_file']['name'][$i];

                    $training_file_detail->save();


                    move_uploaded_file($_FILES['training_file']['tmp_name'][$i], "project/backend/training/file/" . $_FILES['training_file']['name'][$i]);
                }
            }

            
            
            
            
            
             /* ----------------------------------------
              || youtube insert
              ---------------------------------------- */
            
            
            if($request->training_youtube != ""){
                    
                $training_file_detail               = new training_file_detail;

                $training_file_detail->type_id      = '5';

                $training_file_detail->training_id  = $last_id;

                $training_file_detail->file         = $request->training_youtube;

                $training_file_detail->save();
                
            }
            
            
            
            
            if ($request->hasFile('training_audio')) {


                $files = $request->file('training_audio');

                $loop = count($files) - 1;


                /* ----------------------------------------
                  || multiple file upload & insert in training_file_detail table
                  ---------------------------------------- */


                for ($i = 0; $i <= $loop; $i++) {
                    $training_file_detail               = new training_file_detail;

                    $training_file_detail->type_id      = '4';

                    $training_file_detail->training_id  = $last_id;

                    $training_file_detail->file         = time() . "." .$_FILES['training_audio']['name'][$i];

                    $training_file_detail->save();


                    move_uploaded_file($_FILES['training_audio']['tmp_name'][$i], "project/backend/training/audio/" . $_FILES['training_audio']['name'][$i]);
                }
            }


            if ($request->hasFile('training_video')) {


                $files = $request->file('training_video');

                $loop = count($files) - 1;


                /* ----------------------------------------
                  || multiple file upload & insert in training_file_detail table
                  ---------------------------------------- */


                for ($i = 0; $i <= $loop; $i++) {
                    $training_file_detail               = new training_file_detail;

                    $training_file_detail->type_id      = '3';

                    $training_file_detail->training_id  = $last_id;

                    $training_file_detail->file         = time() . "." .$_FILES['training_video']['name'][$i];

                    $training_file_detail->save();


                    move_uploaded_file($_FILES['training_video']['tmp_name'][$i], "project/backend/training/video/" . $_FILES['training_video']['name'][$i]);
                }
            }
            
            Session::flash('insert_message', 'Inserted Successfully!'); 
            $training = DB::table('trainings')->orderBy('id', 'desc')->get();
            return view('backend.training.training_view', compact('training'));
        }
    }

    public function training_edit($id) {

        $training_edit = training::find($id);


        $training_file = DB::select("SELECT * FROM training_file_details where training_id = '$id' && type_id='1'");


        $training_audio = DB::select("SELECT * FROM training_file_details where training_id = '$id' && type_id='4'");


        $training_video = DB::select("SELECT * FROM training_file_details where training_id = '$id' && type_id='3'");

        
        $training_youtube = DB::select("SELECT * FROM training_file_details where training_id = '$id' && type_id='5'");



        return view('backend.training.training_edit', compact('training_edit', 'training_file', 'training_picture', 'training_audio', 'training_video','training_youtube'));
    }

    public function training_ajax_delete($id) {


        $training_file_detail = training_file_detail::find($id);

        $training = training::find($id);


        if (isset($training_file_detail)) {

            $file = $training_file_detail->file;
            $type = $training_file_detail->type_id;
        } else {

            $cover_image = $training->cover_image;
        }



        if (isset($type) && $type == 1) {

            $training_file_detail->delete();

            unlink("project/backend/training/file/" . $file);

            DB::table('training_file_details')->where('file', $file)->delete();
        } elseif (isset($type) && $type == 2) {

            $training_file_detail->delete();

            unlink("project/backend/training/picture/" . $file);

            DB::table('training_file_details')->where('file', $file)->delete();
        } elseif (isset($type) && $type == 3) {

            $training_file_detail->delete();

            unlink("project/backend/training/video/" . $file);

            DB::table('training_file_details')->where('file', $file)->delete();
            
        } elseif (isset($type) && $type == 4) {

            $training_file_detail->delete();

            unlink("project/backend/training/audio/" . $file);

            DB::table('training_file_details')->where('file', $file)->delete();
            
        } elseif (isset($cover_image)) {


            $training_file_detail->delete();

            unlink(public_path('project/backend/training/cover_image/' . $cover_image));
        }
    }

    public function training_update(Request $request) {


        // ------------ update data in database

        $validator = Validator::make($request->all(), [
                    'title'             => 'required',
                    'category_id'       => 'required',
                    'short_description' => 'required',
                    'paid'              => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/training_edit/' . $request->old_id)
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $training = training::find($request->old_id);

            $last_id = $training->id;

            if (isset($request->title)) {
                $training->title = $request->title;
            }
            if (isset($request->category_id)) {
                $training->category_id = $request->category_id;
            }
            if (isset($request->textarea_data)) {
                $training->textarea_data = $request->textarea_data;
            }
            if (isset($request->rich_editor_file)) {
                $training->rich_editor_file = $request->rich_editor_file;
            }
            if (isset($request->short_description)) {
                $training->short_description = $request->short_description;
            }
            if (isset($request->paid)) {
                $training->paid = $request->paid;
            }



            $training->save();


            /* ----------------------------------------
              || update cover image
              ---------------------------------------- */

            if ($_FILES['cover_image']['name'] != "") {

                $cover_image = time().$_FILES['cover_image']['name'];


                // resize file destination path
                $destinationPath = public_path('project/backend/training/cover_image/');



                // Image upload method
                move_uploaded_file($_FILES['cover_image']['tmp_name'], "project/backend/training/cover_image/" . $cover_image);


                $training->cover_image = $cover_image;

                $training->save();
            }



            //---- upload video


            if ($request->file('training_video') != "") {

                $files = $request->file('training_video');

                $loop = count($files) - 1;


                /* ----------------------------------------
                  || multiple file upload & insert in training_file_detail table
                  ---------------------------------------- */


                for ($i = 0; $i <= $loop; $i++) {
                    $training_file_detail               = new training_file_detail;

                    $file = time() . "." .$_FILES['training_video']['name'][$i];

                    $training_file_detail->file         = $file;

                    $training_file_detail->training_id  = $last_id;

                    $training_file_detail->type_id      = "3";

                    $training_file_detail->save();


                    move_uploaded_file($_FILES['training_video']['tmp_name'][$i], "project/backend/training/video/" . $file);
                }
            }



            //---- upload audio


            if ($request->file('training_audio') != "") {

                $files = $request->file('training_audio');


                $loop = count($files) - 1;


                /* ----------------------------------------
                  || multiple file upload & insert in training_file_detail table
                  ---------------------------------------- */


                for ($i = 0; $i <= $loop; $i++) {
                    $training_file_detail               = new training_file_detail;

                    $file = time() . "." .$_FILES['training_audio']['name'][$i];

                    $training_file_detail->file         = $file;

                    $training_file_detail->training_id  = $last_id;

                    $training_file_detail->type_id      = "4";

                    $training_file_detail->save();


                    move_uploaded_file($_FILES['training_audio']['tmp_name'][$i], "project/backend/training/audio/" . $file);
                }
            }





            //---- upload file


            if ($request->file('training_file') != "") {

                $files = $request->file('training_file');

                $loop = count($files) - 1;


                /* ----------------------------------------
                  || multiple file upload & insert in training_file_detail table
                  ---------------------------------------- */


                for ($i = 0; $i <= $loop; $i++) {
                    
                    $training_file_detail = new training_file_detail;

                    $file = time() . "." .$_FILES['training_file']['name'][$i];

                    $training_file_detail->file = $file;

                    $training_file_detail->training_id = $last_id;

                    $training_file_detail->type_id = "1";

                    $training_file_detail->save();


                    move_uploaded_file($_FILES['training_file']['tmp_name'][$i], "project/backend/training/file/" . $file);
                }
            }
            
            /* ----------------------------------------
                || update training_youtube
               ---------------------------------------- */
              
              if($request->training_youtube != ""){
                  training_file_detail::where('training_id',$last_id)
                      ->where('type_id',5)
                      ->update(['file' => $request->training_youtube]);

              }else{
                  training_file_detail::where('training_id',$last_id)
                      ->where('type_id',5)
                      ->update(['file' => ""]);
              }

            // -- view in retrun page
            Session::flash('update_message', 'Updated Successfully!'); 
            $training = DB::table('trainings')->orderBy('id', 'desc')->get();
            return view('backend.training.training_view', compact('training'));
        }
    }

    public function training_delete($id) {

        $Deletetraining_data = training::find($id);

        $Deletetraining_file = training_file_detail::where('training_id', $id)
                ->orderBy('id', 'desc')
                ->take(10)
                ->get();


        foreach ($Deletetraining_file as $d_file) {


            if ($d_file->type_id == 1) {
                unlink(public_path() . '/project/backend/training/file/' . $d_file->file);
            }

            if ($d_file->type_id == 2) {
                unlink(public_path() . '/project/backend/training/cover_image/' . $d_file->file);
            }

            if ($d_file->type_id == 3) {
                unlink(public_path() . '/project/backend/training/video/' . $d_file->file);
            }

            if ($d_file->type_id == 4) {
                unlink(public_path() . '/project/backend/training/audio/' . $d_file->file);
            }
        }



        DB::table('training_file_details')->where('training_id', $id)->delete();
        DB::table('trainings')->where('id', $id)->delete();

        Session::flash('delete_message', ''
                . 'Deleted Successfully!'); 
        return redirect('admin/training_view');
    }

}
