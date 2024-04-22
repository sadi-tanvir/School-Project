<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddClassExam extends Model
{
    use HasFactory;

    protected $table = 'add_class_exam';

    protected $fillable = [
        'class_exam_name',
        'position',
        'status',
        'action',
        'school_code',
    ];

    public function add_class(){
       return $this->belongsToMany(AddClass::class);
    }
}
