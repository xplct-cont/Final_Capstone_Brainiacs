<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career_Interest_Test_Result extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable =
    [
        'student_id',
        'interest_result'
    ];

    protected $table = "career_interest_test_results";


    protected $casts = [
        'created_at' => 'datetime',
        
    ];


    public function student() {
        return $this->belongsTo('App\Models\Student');

    }
    
}
