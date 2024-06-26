<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    use HasFactory;

    protected $table = 'acts';
    protected $guarded = [];
    protected $fillable = ['tanggal', 'siswa_id', 'practical', 'sensorial', 'language', 'math', 'culture', 'notifikasi'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
