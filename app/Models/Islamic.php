<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Islamic extends Model
{
    use HasFactory;

    protected $table = 'islamics';
    protected $guarded = [];
    protected $fillable = ['tanggal', 'siswa_id', 'hadist', 'hadist_stat', 'quran', 'quran_stat', 'doa', 'doa_stat', 'notifikasi'];
}
