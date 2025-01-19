<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    use HasFactory;

    protected $table = 'youtubes';

    // Kolom yang boleh diisi
    protected $fillable = ['pdf_id', 'judul', 'keterangan', 'link'];

    /**
     * Relasi ke model Pdf.
     * Setiap entri Youtube terkait dengan satu entri Pdf.
     */
    public function pdf()
    {
        return $this->belongsTo(Pdf::class, 'pdf_id');
    }
}
