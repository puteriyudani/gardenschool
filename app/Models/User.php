<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users'; // Menentukan nama tabel yang digunakan oleh model
    protected $primaryKey = 'id'; // Menentukan primary key yang digunakan

    protected $fillable = [
        'name',
        'nohp',
        'password',
        'level',
        'last_login', // Kolom tambahan untuk mencatat waktu login terakhir
    ];

    protected $dates = [
        'last_login', // Mendefinisikan kolom yang bertipe datetime
    ];

    // Menentukan akses level berdasarkan nilai integer
    protected function level(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["admin", "guru", "ortu", "pembeli"][$value],
        );
    }

    // Relasi One-to-Many dengan model Siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'orangtua_id');
    }

    // Fungsi untuk mengupdate waktu login saat user berhasil login
    public static function updateLastLogin($userId)
    {
        $user = self::find($userId);
        if ($user) {
            $user->last_login = now(); // Update last_login dengan waktu saat ini
            $user->save();
        }
    }
}
