<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInformationSheets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_information_sheets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            //STUD INFO
            $table->string('type_of_student')->nullable();
            $table->string('last_attended_school')->nullable();
            $table->string('school_year')->nullable();
            //PERSONAL DATA
            $table->date('birthdate')->nullable();
            $table->string('nationality')->nullable();
            $table->string('status')->nullable();
            $table->string('number')->nullable();
            $table->string('height')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('religion')->nullable();
            $table->string('weight')->nullable();
            //EDUCATIONAL BACKGROUND
            $table->string('elementary')->nullable();
            $table->string('secondary')->nullable();
            $table->string('elem_honors_rec')->nullable();
            $table->string('secon_honors_rec')->nullable();
            $table->string('elem_year_grad')->nullable();
            $table->string('secon_year_grad')->nullable();
            //FOR TRANSFEREE
            $table->string('level_last_attended')->nullable();
            $table->string('school_add')->nullable();
            $table->string('year')->nullable();
            $table->string('reasons_for_transfer')->nullable();
            //AFFILIATION/ORGANIZATION
            $table->string('org_name')->nullable();
            $table->string('position')->nullable();
            $table->string('org_year')->nullable();
            //SELF
            $table->string('fav_sub')->nullable();
            $table->string('most_dif_sub')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('likes')->nullable();
            $table->string('dislikes')->nullable();
            //FAMILY BACKGROUND
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('father_age')->nullable();
            $table->string('mother_age')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('father_off_ad')->nullable();
            $table->string('mother_off_ad')->nullable();
            $table->string('father_educ_stat')->nullable();
            $table->string('mother_educ_stat')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('mar_parents_stat')->nullable();
            $table->string('rank_order')->nullable();
            $table->string('no_of_brothers')->nullable();
            $table->string('no_of_sisters')->nullable();
            $table->string('living_with')->nullable();
            $table->string('how_are_you_supp')->nullable();
            $table->string('rel_with_father')->nullable();
            $table->string('rel_with_mother')->nullable();
            $table->string('rel_with_brother')->nullable();
            $table->string('rel_with_sister')->nullable();
            //IF MARRIED
            $table->string('spouse_name')->nullable();
            $table->string('spouse_age')->nullable();
            $table->string('spouse_nationality')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_comp_name')->nullable();
            $table->string('company_num')->nullable();
            //HEALTH HISTORY
            $table->string('past_disease')->nullable();
            $table->string('injuries')->nullable();
            $table->string('operations')->nullable();
            $table->string('mens_history')->nullable();
            //SIGNED
            $table->date('date_signed')->nullable();
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
        Schema::dropIfExists('student_information_sheets');
    }
}
