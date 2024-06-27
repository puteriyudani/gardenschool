<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HadistBaby extends Model
{
    use HasFactory;

    protected $table = 'hadist_babys';
    protected $guarded = [];
    protected $fillable = ['hadist'];

    public function islamics()
    {
        return $this->hasMany(Islamic::class);
    }
}
