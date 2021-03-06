<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMondaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mondays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section_id')->nullable();
            $table->string('batch_id')->nullable();
            $table->string('course_id')->nullable();
            $table->string('teacher_id')->nullable();
            $table->string('room_id')->nullable();
            $table->string('class_start')->nullable();
            $table->string('class_end')->nullable();
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
        Schema::dropIfExists('mondays');
    }
}
