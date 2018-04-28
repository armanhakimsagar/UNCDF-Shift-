<?php

namespace App\Http\Controllers\Frontend\Research;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ResearchModel\Research;
use App\ResearchModel\Research_file_detail;
use DB;

class Research_Front_Controller extends Controller {

    public function Front_file_view() {
        
        $Research = Research::all();
        
        return view('frontend.research.research_metarial', compact('Research'));
    }

    public function Front_file_details_view($id) {

        $Research_details = Research::find($id);
        $count_file = count(research_file_detail::where('type_id', 1)
                        ->where('post_id', $id)
                        ->orderBy('id', 'desc')
                        ->take(10)
                        ->get());

        $count_audio = count(research_file_detail::where('type_id', 4)
                        ->where('post_id', $id)
                        ->orderBy('id', 'desc')
                        ->take(10)
                        ->get());

        $count_video = count(research_file_detail::where('type_id', 3)
                        ->where('post_id', $id)
                        ->orderBy('id', 'desc')
                        ->take(10)
                        ->get());

        $count_picture = count(research_file_detail::where('type_id', 2)
                        ->where('post_id', $id)
                        ->orderBy('id', 'desc')
                        ->take(10)
                        ->get());

        return view('frontend.research.research_metarial_deatils', compact('Research_details', 'count_file', 'count_audio', 'count_video', 'count_picture'));
    }
    
    
    public function research_ajax_file_view($id){

        $research_file_detail = research_file_detail::where('post_id',$id)
                        ->get();
        
         
        foreach($research_file_detail as $file){ ?>
        
        <div class="alert alert-default" style="border: 1px solid #ccc; margin:5px 0px 0px 0px; width:100%">
            <strong><?php echo $file->path; ?></strong>
        </div> 
    
    <?php
        }
        
    }

}
