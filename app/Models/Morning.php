<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morning extends Model
{
    use HasFactory;

    protected $table = 'mornings';
    protected $guarded = [];
    protected $fillable = ['tanggal', 'siswa_id', 'kegiatan', 'circletime', 'notifikasi'];
}
