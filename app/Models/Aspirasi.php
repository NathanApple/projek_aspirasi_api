<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $fillable = ["id_pelaporan", "status", "feedback"];
    protected $primaryKey = "id_aspirasi";

}
