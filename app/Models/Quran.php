<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quran extends Model
{
    use HasFactory;

    protected $table = 'qurans';
    protected $guarded = [];
    protected $fillable = ['quran'];

    public function islamics()
    {
        return $this->hasMany(Islamic::class);
    }
}
