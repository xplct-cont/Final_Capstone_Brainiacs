<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

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
}