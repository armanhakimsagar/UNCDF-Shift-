<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('title');
            $table->longtext('topic');
            $table->integer('category');
            $table->longtext('textarea_data');
            $table->longtext('rich_editor_file')->nullable();
            $table->longtext('short_description');
            $table->tinyInteger('status');
            $table->date('start_time');
            $table->date('complete_date');
            $table->longtext('short_tag');
            $table->string('cover_image');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('researches');
    }
}
