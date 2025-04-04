<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;

    protected $table = 'pdfs';

    // Kolom yang boleh diisi
    protected $fillable = ['judul', 'file', 'subtopik_id'];

    /**
     * Relasi ke model Subtopik.
     * Setiap entri Pdf dapat memiliki satu entri Subtopik.
     */
    public function subtopik()
    {
        return $this->belongsTo(SubTopik::class, 'subtopik_id');
    }
}
