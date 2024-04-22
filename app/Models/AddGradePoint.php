<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddGradePoint extends Model
{
    use HasFactory;

    protected $table = 'add_grade_point';

    protected $fillable = [
        'mark_point_1st',
        'mark_point_2nd',
        'grade_point',
        'letter_grade',
        'note',
        'status',
        'action',
        'school_code',
    ];

    public function add_class_exam(){
        return $this->belongsToMany(AddClassExam::class);   
     }
}
