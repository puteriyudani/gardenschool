<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lunch extends Model
{
    use HasFactory;

    protected $table = 'lunchs';
    protected $guarded = [];
    protected $fillable = ['tanggal', 'siswa_id', 'menu', 'keterangan', 'indikator', 'catatan'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
