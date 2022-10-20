<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counseling_Anecdotal_Record extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable =
    [
       
        'student_id',
        'date_time_called',
        'reasons_for_contact',
        'referred_by',
        'reasons_for_referral',
        'follow_up_counseling_session',
        'behavior_observed',
        'interview_findings',
        'clinical_impressions',
        'recommendation',
    ];

    protected $table = "counseling_anecdotal_records";


    protected $casts = [
        'created_at' => 'datetime',
        'date_time_called' => 'date:hh:mm',
        
    ];


    public function student() {
        return $this->belongsTo('App\Models\Student');

    }
    
}

