<?php

namespace App\Http\Controllers\Backend\MapRange;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use DB;

class MapRangeController extends Controller
{
    public function maprange_form_view()
    {
    	return view('backend.maprange.maprange_form');
    }

    public function maprange_view()
    {

    	$map_range = DB::table('msi_ranges')->orderBy('range_id', 'desc')->paginate(10);
    	return view('backend.maprange.maprange_view',compact('map_range'));
    }

    public function maprange_data_insert(Request $request)
    {
    	 
    	 $from = $request->input('from');
         $to = $request->input('to');
         $color = $request->input('color');
       
        
        DB::table('msi_ranges')->insert(

        	['from' => $from,
            'to' => $to,
            'color' => $color,]

        );

       
       return redirect('admin/map_color_range_view')->with('success', 'Color Added successfully');
    }
}
