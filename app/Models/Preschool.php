<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preschool extends Model
{
    use HasFactory;

    protected $table = 'preschools';
    protected $guarded = [];
    protected $fillable = ['tanggal', 'siswa_id', 'huruf', 'angka', 'english'];
}
