<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    use HasFactory;

    protected $table = 'topiks';
    protected $guarded = [];
    protected $fillable = ['tema_id', 'topik'];

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'tema_id');
    }

    public function subtopik()
    {
        return $this->hasMany(Topik::class, 'topik_id');
    }
}
