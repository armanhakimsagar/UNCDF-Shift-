<?php

namespace App\ResearchModel;

use Illuminate\Database\Eloquent\Model;

class Research_file_detail extends Model
{
   protected $fillable = ['type_id', 'title','path','short_description'];
}
