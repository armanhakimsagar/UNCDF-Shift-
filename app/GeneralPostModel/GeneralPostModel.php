<?php

namespace App\GeneralPostModel;

use Illuminate\Database\Eloquent\Model;

class GeneralPostModel extends Model
{
    protected $table="general_post_data";
	protected $fillable=[
	'title','short_description','description','chart_query_method','post_type','chart_id',
	];
}
