<?php

namespace App\Http\Controllers\frontend\training;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TrainingModel\training;
use App\TrainingModel\training_file_detail;

class training_Front_Controller extends Controller {

    public function Front_file_view() {

        $training = training::all();

        $training_file_detail = training_file_detail::all();

        $count_file = count(training_file_detail::where('type_id', 1)
                        ->get());

        $count_video = count(training_file_detail::where('type_id', 3)
                        ->get());

        $count_audio = count(training_file_detail::where('type_id', 4)
                        ->get());

        return view('frontend.training.training_view', compact('training', 'count_file', 'count_video', 'count_audio', 'training_file_detail'));
    }
    
    public function training_ajax_file_view($id){

        $training_file = training_file_detail::where('training_id',$id)
                        ->get();
        
       
        foreach($training_file as $file){ ?>
        
        <div class="alert alert-default" style="border: 1px solid #ccc; margin:5px 0px 0px 0px; width:100%">
            <strong><?php echo $file->file; ?></strong>
        </div> 
    
    <?php
        }
        
    }

}
