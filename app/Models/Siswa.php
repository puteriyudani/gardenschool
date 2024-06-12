<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $guarded = [];
    protected $fillable = ['orangtua_id', 'tahun_id', 'nama', 'panggilan', 'noinduk', 'kelompok', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'anakke', 'nama_ayah', 'nama_ibu', 'alamat', 'image'];

    public function ortu()
    {
        return $this->belongsTo(User::class, 'orangtua_id');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

    public function breakfast()
    {
        return $this->belongsTo(Breakfast::class);
    }

    public function catatanguru()
    {
        return $this->belongsTo(Catatanguru::class);
    }

    public function catatanorangtua()
    {
        return $this->belongsTo(Catatanorangtua::class);
    }
}
