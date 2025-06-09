<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Industri;

class Pkl extends Model
{
    protected $fillable = ['siswa_id', 'guru_id', 'industri_id', 'mulai', 'selesai'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function industri()
    {
        return $this->belongsTo(Industri::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

}
