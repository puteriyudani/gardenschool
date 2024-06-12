<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pooppee extends Model
{
    use HasFactory;

    protected $table = 'pooppees';
    protected $guarded = [];
    protected $fillable = ['tanggal', 'siswa_id', 'poop', 'pee', 'catatan'];
}
