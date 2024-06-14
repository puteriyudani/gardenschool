<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doa extends Model
{
    use HasFactory;

    protected $table = 'doas';
    protected $guarded = [];
    protected $fillable = ['doa'];

    public function islamics()
    {
        return $this->hasMany(Islamic::class);
    }
}
