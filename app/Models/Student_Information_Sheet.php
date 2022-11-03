<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Information_Sheet extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable =
    [
        'student_id',
        'type_of_student',
        'last_attended_school',
        'school_year',
        //PERSONAL DATA
        'birthdate',
        'nationality',
        'status',
        'number',
        'height',
        'birthplace',
        'religion',
        'weight',
        //EDUCATIONAL BACKGROUND
        'elementary',
        'secondary',
        'elem_honors_rec',
        'secon_honors_rec',
        'elem_year_grad',
        'secon_year_grad',
        //FOR TRANSFEREE
        'level_last_attended',
        'school_add',
        'year',
        'reasons_for_transfer',
        //AFFILIATION/ORGANIZATION
        'org_name',
        'position',
        'org_year',
        //SELF
        'fav_sub',
        'most_dif_sub',
        'hobbies',
        'likes',
        'dislikes',
        //FAMILY BACKGROUND
        'father',
        'mother',
        'father_age',
        'mother_age',
        'father_occupation',
        'mother_occupation',
        'father_off_ad',
        'mother_off_ad',
        'father_educ_stat',
        'mother_educ_stat',
        'monthly_income',
        'mar_parents_stat',
        'rank_order',
        'no_of_brothers',
        'no_of_sisters',
        'living_with',
        'how_are_you_supp',
        'rel_with_father',
        'rel_with_mother',
        'rel_with_brother',
        'rel_with_sister',
        //IF MARRIED
        'spouse_name',
        'spouse_age',
        'spouse_nationality',
        'spouse_occupation',
        'spouse_comp_name',
        'company_num',
        //HEALTH HISTORY
        'past_disease',
        'injuries',
        'operations',
        'mens_history',
        //SIGNED
        'date_signed'
    ];

    protected $table = "student_information_sheets";


    protected $casts = [
        'created_at' => 'datetime',
        'date' => 'datetime',
        'date_signed' => 'datetime'
        
    ];


    public function student() {
        return $this->belongsTo('App\Models\Student');

    }
    
}
