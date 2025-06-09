<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // protected $guard = 'siswa';
    protected $fillable = [
        'nis',
        'nama',
        'alamat',
        'kontak',
        'email',
        'gender',
        'status',
        'foto'
    ];

    protected static function booted()
    {
    static::updating(function ($siswa) {
        if ($siswa->isDirty('email')) {
            \App\Models\User::where('email', $siswa->getOriginal('email'))
                ->update(['email' => $siswa->email]);
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
