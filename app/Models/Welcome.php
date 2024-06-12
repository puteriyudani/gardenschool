<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Welcome extends Model
{
    use HasFactory;

    protected $table = 'welcomes';
    protected $guarded = [];
    protected $fillable = ['tanggal', 'siswa_id', 'indikator', 'keterangan', 'notifikasi'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
