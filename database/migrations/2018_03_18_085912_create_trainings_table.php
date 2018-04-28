<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 500);
            $table->integer('category_id');
            $table->longtext('textarea_data')->nullable();
            $table->longtext('rich_editor_file')->nullable();
            $table->longtext('short_description')->nullable();
            $table->longtext('target_audience')->nullable();
            $table->string('paid',10);
            $table->string('position',10);
            $table->string('cover_image', 2000)->nullable();
            $table->date('start_time')->nullable();
            $table->date('end_time')->nullable();
            
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
        Schema::dropIfExists('training');
    }
}
