<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddClassWiseGroup extends Model
{
    use HasFactory;

    protected $table = 'add_class_wise_group';

    protected $fillable = [
        'class_name',
        'group_name',
        'status',
        'action',
        'school_code',
    ];

    public function class()
    {
        return $this->belongsTo(AddClass::class);
    }
}
