<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchFileDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_file_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->string('title', 1000);
            $table->string('path', 1000);
            $table->string('short_description', 1000);
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('post_id')->references('id')->on('researches');
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
        Schema::dropIfExists('research_file_details');
    }
}
