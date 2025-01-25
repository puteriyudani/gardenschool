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
    public function kelompoks()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok', 'id');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

    public function breakfasts()
    {
        return $this->hasMany(Breakfast::class);
    }
    public function mornings()
    {
        return $this->hasMany(Morning::class);
    }
    public function welcomes()
    {
        return $this->hasMany(Welcome::class);
    }
    public function islamics()
    {
        return $this->hasMany(Islamic::class);
    }
    public function preschools()
    {
        return $this->hasMany(Preschool::class);
    }
    public function tematiks()
    {
        return $this->hasMany(Tematik::class);
    }
    public function pooppees()
    {
        return $this->hasMany(Pooppee::class);
    }
    public function recallings()
    {
        return $this->hasMany(Recalling::class);
    }
}
