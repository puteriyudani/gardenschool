<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hadist extends Model
{
    use HasFactory;

    protected $table = 'hadists';
    protected $guarded = [];
    protected $fillable = ['hadist'];

    public function islamics()
    {
        return $this->hasMany(Islamic::class);
    }
}
