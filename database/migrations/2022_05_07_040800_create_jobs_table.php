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
            $table->id();
            $table->string('user_id');
            $table->string('job_id');
            $table->string('location_id');
            $table->string('sub_location_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('sub_category_id')->nullable();
            $table->text('job_title')->nullable();
            $table->longText('workSteps')->nullable();
            $table->longText('task_proof')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('worker_need')->nullable();
            $table->string('each_worker_earn')->nullable();
            $table->string('require_screenshot')->nullable();
            $table->string('estimated_day')->nullable();
            $table->string('total_spend')->nullable();
            $table->string('work_done')->nullable();
            $table->integer('job_status')->default(0);
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
