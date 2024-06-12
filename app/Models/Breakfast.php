<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakfast extends Model
{
    use HasFactory;

    protected $table = 'breakfasts';
    protected $guarded = [];
    protected $fillable = ['tanggal', 'siswa_id', 'menu_id', 'keterangan', 'indikator', 'catatan'];
}
