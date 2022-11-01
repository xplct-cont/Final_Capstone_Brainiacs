<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personality_Test_Result extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable =
    [
        'student_id',
        'personality_result'
    ];

    protected $table = "personality_test_results";


    protected $casts = [
        'created_at' => 'datetime',
        
    ];


    public function student() {
        return $this->belongsTo('App\Models\Student');

    }
    
}
