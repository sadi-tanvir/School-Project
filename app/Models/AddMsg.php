<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddMsg extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'school_code',
        'message_count',
        'action',
    ];

    protected $table = "add_messages";
}
