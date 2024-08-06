<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $guarded = [];
    protected $fillable = ['menu', 'karbohidrat', 'protein', 'lemak', 'serat', 'kalori'];

    public function breakfasts()
    {
        return $this->hasMany(Breakfast::class);
    }
}
