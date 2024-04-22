<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddClassWiseSubject extends Model
{
    use HasFactory;

    protected $table = 'add_class_wise_subject';

    protected $fillable = [
        'class_name',
        'subject_name',
        'subject_type',
        'group_name',
        'subject_serial',
        'subject_marge',
        'status',
        'action',
        'school_code',
    ];


}
