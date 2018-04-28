<?php

namespace App\Http\Controllers\Frontend\databank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DatabankModel\collection;

class DatabankController extends Controller
{
   public function collcetionview(){
       
       $research = DB::table('collections')->get();

       return view('backend.research.research_view', compact('research'));
   }
   
}
