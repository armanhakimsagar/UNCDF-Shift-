<?php

namespace App\TrainingModel;

use Illuminate\Database\Eloquent\Model;

class training extends Model
{
    protected $fillable = ['title','category_id','rich_editor_file','short_description','target_audience','paid','cover_image','series_box'];
}
