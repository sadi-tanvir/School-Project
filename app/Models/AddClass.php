<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddClass extends Model
{
    use HasFactory;
    protected $table = 'add_class';

    protected $fillable = [
        'class_name',
        'position',
        'status',
        'action',
        'school_code',
    ];

    public function add_class_exam(){
        return $this->belongsToMany(AddClassExam::class);
     }
}
