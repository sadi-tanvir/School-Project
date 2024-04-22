<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddBoardExam extends Model
{
    use HasFactory;

    protected $table = 'add_board_exam';

    protected $fillable = [
        'board_exam_name',
        'position',
        'status',
        'action',
        'school_code',
    ];
}
