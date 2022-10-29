<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentConferenceRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_conference_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->date('date')->nullable();
            $table->string('relation_to_student')->nullable();
            $table->string('reason_for_contact')->nullable();
            $table->string('inquiries_referral_appointment')->nullable();
            $table->string('problem_concern')->nullable();
            $table->string('topics_discussed')->nullable();
            $table->string('suggested_resolution')->nullable();
            $table->string('action_taken')->nullable();
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
        Schema::dropIfExists('parent_conference_records');
    }
}
