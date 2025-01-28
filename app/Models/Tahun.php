<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;

    protected $table = 'tahuns';
    protected $guarded = [];
    protected $fillable = ['tahun', 'status'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'tahun_id');
    }
}
