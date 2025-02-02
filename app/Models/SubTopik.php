<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTopik extends Model
{
    use HasFactory;

    protected $table = 'sub_topiks';
    protected $guarded = [];
    protected $fillable = ['topik_id', 'subtopik'];

    public function topik()
    {
        return $this->belongsTo(Topik::class, 'topik_id');
    }
}
