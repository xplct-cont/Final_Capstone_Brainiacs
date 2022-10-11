<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anecdotal_Record extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'student_id',
        'observation_date_time',
        'description_of_incident',
        'location_of_incident',
        'action_taken',
        'recommendations',
        'reasons_for_contact',
        'referred_by',
        'reasons_for_referral',
        'follow_up_counseling_session',
        'voluntary',
        'behavior_observed',
        'interview_findings',
        'clinical_impressions',
        'recommendation'

    ];

    protected $table = "anecdotal_records";


    protected $casts = [
        'created_at' => 'datetime',
        'observation_date_time' => 'date:hh:mm',
    ];


    public function student() {
        return $this->belongsTo('App\Models\Student');

    }
}
