<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobCVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_c_v_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_id')->nullable();
            $table->string('user_id')->nullabel();
            $table->string('name')->nullabel();
            $table->string('email')->nullabel();
            $table->string('contact')->nullable();
            $table->longText('address')->nullable();
            $table->string('cover_letter')->nullable();
            $table->string('cv')->nullable();
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
        Schema::dropIfExists('job_c_v_s');
    }
}
