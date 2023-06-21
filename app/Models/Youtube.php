<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    use HasFactory;

    protected $table = 'youtubes';
    protected $guarded = [];
    protected $fillable = ['judul', 'keterangan', 'link'];
}
