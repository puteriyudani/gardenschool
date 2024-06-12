<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recalling extends Model
{
    use HasFactory;

    protected $table = 'recallings';
    protected $guarded = [];
    protected $fillable = ['tanggal', 'siswa_id', 'indikator', 'keterangan', 'notifikasi'];
}
