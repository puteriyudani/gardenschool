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

    public function hadist()
    {
        return $this->belongsTo(Hadist::class);
    }

    public function quran()
    {
        return $this->belongsTo(Quran::class);
    }

    public function doa()
    {
        return $this->belongsTo(Doa::class);
    }
}
