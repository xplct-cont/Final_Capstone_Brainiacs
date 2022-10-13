<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anecdotal_Record extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable =
    [
        'student_id',
        'observation_date_time',
        'description_of_incident',
        'location_of_incidents',
        'actions_taken',
        'recommendations',

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
