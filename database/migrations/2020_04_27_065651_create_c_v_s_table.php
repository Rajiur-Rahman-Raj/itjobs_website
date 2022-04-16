<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_v_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->longText('profession')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->longText('facebook_link')->nullable();
            $table->longText('linkedin_link')->nullable();
            $table->longText('position')->nullable();
            $table->longText('experiance')->nullable();
            $table->longText('project')->nullable();
            $table->longText('training')->nullable();
            $table->longText('education')->nullable();
            $table->longText('reference')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('total_cost')->nullable();
            $table->string('active')->default(0);
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
        Schema::dropIfExists('c_v_s');
    }
}
