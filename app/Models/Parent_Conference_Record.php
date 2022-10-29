<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parent_Conference_Record extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable =
    [
       
        'student_id',
        'date',
        'relation_to_student',
        'reason_for_contact',
        'inquiries_referral_appointment',
        'problem_concern',
        'topics_discussed',
        'suggested_resolution',
        'action_taken'
    ];

    protected $table = "parent_conference_records";


    protected $casts = [
        'created_at' => 'datetime',
        'date' => 'date',
        
    ];


    public function student() {
        return $this->belongsTo('App\Models\Student');

    }
    
}

