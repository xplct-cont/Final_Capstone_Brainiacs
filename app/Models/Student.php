<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable =['user_id', 'firstname', 'lastname', 'middlename', 'gender',  'age', 'year_section', 'email', 'parent_name', 'parent_email', 'address'];


    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');

    }


    public function isEditable(){
        $student = request()->route('student');

      

         return auth()->user()->role == 'editor' || auth()->user()->id == $student->user_id;
    }

    public function anecdotal_record(){
        return $this->hasMany('App\Models\Anecdotal_Record');
    }

    public function counseling_anecdotal_record(){
        return $this->hasMany('App\Models\Counseling_Anecdotal_Record');
    }

    public function parent_conference_record(){
        return $this->hasMany('App\Models\Parent_Conference_Record');
    }

    public function career_interest_test_result(){
        return $this->hasMany('App\Models\Career_Interest_Test_Result');
    }

    public function personality_test_result(){
        return $this->hasMany('App\Models\Personality_Test_Result');
    }

    public function student_information_sheet(){
        return $this->hasMany('App\Models\Student_Information_Sheet');
    }
}