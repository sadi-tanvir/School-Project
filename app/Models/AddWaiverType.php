<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddWaiverType extends Model
{
    use HasFactory;
    protected $table = "waiver_type";

    protected $fillable = [
        "waiver_type_name",
        "status",
        "action",
        "school_code",
    ];
}
