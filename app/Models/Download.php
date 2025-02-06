<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $table = 'downloads'; // Nama tabel di database

    protected $fillable = [
        'user_id',
        'tanggal',
    ];

    /**
     * Relasi ke tabel users (User yang melakukan download)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
