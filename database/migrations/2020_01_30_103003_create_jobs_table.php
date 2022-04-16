<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('country_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('job_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('salary')->nullable();
            $table->string('deadline')->nullable();
            $table->longText('details')->nullable();
            $table->longText('response')->nullable();
            $table->longText('requirements')->nullable();
            $table->longText('apply')->nullable();
            $table->string('website_link')->nullable();
            $table->string('apply_link')->nullable();
            $table->string('tags')->nullable();
            $table->string('remote')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('logo')->nullable();
            $table->string('normal_background')->nullable();
            $table->string('special_background')->nullable();
            $table->string('background_color')->nullable();
            $table->string('week')->nullable();
            $table->string('month')->nullable();
            $table->string('active')->nullable();
            $table->string('total_cost')->nullable();
            $table->string('payment')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('transaction_id')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
