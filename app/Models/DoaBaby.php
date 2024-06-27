<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoaBaby extends Model
{
    use HasFactory;

    protected $table = 'doa_babys';
    protected $guarded = [];
    protected $fillable = ['doa'];

    public function islamics()
    {
        return $this->hasMany(Islamic::class);
    }
}
