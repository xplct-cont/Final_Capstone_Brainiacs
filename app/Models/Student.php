<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable =['user_id', 'firstname', 'lastname', 'gender', 'year_section', 'email', 'address'];


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
}