<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuranBaby extends Model
{
    use HasFactory;

    protected $table = 'quran_babys';
    protected $guarded = [];
    protected $fillable = ['quran'];

    public function islamics()
    {
        return $this->hasMany(Islamic::class);
    }
}
