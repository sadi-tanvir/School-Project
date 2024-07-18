<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParadarsitaSuchok extends Model
{
    use HasFactory;

    protected $table = "paradarsita_suchoks";

    protected $fillable = [
        "class",
        "subject",
        "segment",
        "suchok_name",
        "suchok_value",
        "suchok_matra_rectengle",
        "suchok_matra_circle",
        "suchok_matra_triangle"
    ];
}
