<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddReportName extends Model
{
    use HasFactory;

    protected $table = 'add_report_name';

    protected $fillable = [
        'report_name',
        'status',
        'action',
        'school_code',
    ];
}
