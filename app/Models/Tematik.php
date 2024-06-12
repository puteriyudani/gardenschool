<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tematik extends Model
{
    use HasFactory;

    protected $table = 'tematiks';
    protected $guarded = [];
    protected $fillable = ['tanggal', 'siswa_id', 'judul1', 'judul2', 'kegiatan1', 'kegiatan2'];
}
