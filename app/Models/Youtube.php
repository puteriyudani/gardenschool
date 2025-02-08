<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    use HasFactory;

    protected $table = 'youtubes';

    // Kolom yang boleh diisi
    protected $fillable = ['subtopik_id', 'judul', 'link'];

    public function subtopik()
    {
        return $this->belongsTo(SubTopik::class, 'subtopik_id');
    }
}
