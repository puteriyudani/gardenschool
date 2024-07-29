<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use HasFactory;

    protected $table = 'vocabularys';
    protected $guarded = [];
    protected $fillable = ['tanggal', 'siswa_id', 'vocabulary', 'sentence', 'tale', 'song'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
