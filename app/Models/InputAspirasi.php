<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputAspirasi extends Model
{
    use HasFactory;
    protected $fillable = ["nik", "id_kategori", "lokasi", "keterangan"];

    protected $primaryKey = "id_pelaporan";

    public function penduduk(){
        return $this->belongsTo(Penduduk::class, 'nik');
    }

    public function kategori (){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

}
