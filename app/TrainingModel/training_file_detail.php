<?php

namespace App\TrainingModel;

use Illuminate\Database\Eloquent\Model;

class training_file_detail extends Model
{
   protected $fillable = ['training_video','training_audio','training_file','training_id','type_id'];
}
