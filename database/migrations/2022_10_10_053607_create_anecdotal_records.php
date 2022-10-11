<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnecdotalRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anecdotal_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->dateTime('observation_date_time')->nullable();
            $table->string('description_of_incident')->nullable();
            $table->string('location_of_incident')->nullable();
            $table->string('action_taken')->nullable();
            $table->string('recommendations')->nullable();
            $table->string('reasons_for_contact')->nullable();
            $table->string('referred_by')->nullable();
            $table->string('reasons_for_referral')->nullable();
            $table->string('follow_up_counseling_session')->nullable();
            $table->string('voluntary')->nullable();
            $table->string('behavior_observed')->nullable();
            $table->string('interview_findings')->nullable();
            $table->string('clinical_impressions')->nullable();
            $table->string('recommendation')->nullable();
            $table->timestamps();


            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anecdotal_records');
    }
}
