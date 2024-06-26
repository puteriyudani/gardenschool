<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fun extends Model
{
    use HasFactory;

    protected $table = 'funs';
    protected $guarded = [];
    protected $fillable = ['tanggal', 'siswa_id', 'tidur', 'poop', 'pee', 'mandi', 'notifikasi'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
