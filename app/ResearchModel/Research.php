<?php

namespace App\ResearchModel;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
   protected $fillable = ['title', 'topic', 'category','textarea_data','rich_editor_file','short_description','status', 'start_time','complete_date','short_tag','file','cover_image'];
}
