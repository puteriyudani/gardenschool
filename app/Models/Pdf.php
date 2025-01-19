<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;

    protected $table = 'pdfs';

    // Kolom yang boleh diisi
    protected $fillable = ['judul', 'keterangan', 'file'];

    /**
     * Relasi ke model Youtube.
     * Setiap entri Pdf dapat memiliki banyak entri Youtube.
     */
    public function youtubes()
    {
        return $this->hasMany(Youtube::class, 'pdf_id');
    }
}
