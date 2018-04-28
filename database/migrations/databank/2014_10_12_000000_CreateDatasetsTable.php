<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Datasets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dataset_title');
            $table->string('ref_id');
            $table->string('year');
            $table->string('country');
            $table->string('producers');
            $table->string('sponsor');
            $table->string('collection');
            $table->date('entry_time');
            $table->string('use_type');
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


