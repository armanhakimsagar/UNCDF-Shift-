<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbcollectionsdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Dbcollectionsdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('posttype_id');
            $table->string('post_title');
            $table->longText('post_description');
            $table->string('post_subtype_id')->nullable();
            $table->string('post_filetype_id');
            $table->string('fileoriginalname');
            $table->string('file_path');
            $table->string('order');
            $table->string('status');
            $table->integer('dataset_id')->nullable();
            $table->integer('collection_id')->unsigned();
            $table->foreign('collection_id')->references('id')->on('collections');
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
        Schema::dropIfExists('datasets');
    }
}



