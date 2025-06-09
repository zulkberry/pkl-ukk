<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['nama', 'nip', 'gender', 'alamat', 'kontak', 'email', 'foto'];

    protected static function booted()
    {
        static::updating(function ($guru) {
            if ($guru->isDirty('email')) {
                \App\Models\User::where('email', $guru->getOriginal('email'))
                    ->update(['email' => $guru->email]);
            }
        });
    }

    public function pkls()
    {
        return $this->hasMany(Pkl::class);
    }

    public function infoGender(): string
    {
        return match ($this->gender) {
            'L' => 'Laki-laki',
            'P' => 'Perempuan',
            default => 'Tidak diketahui',
        };
    }
}
