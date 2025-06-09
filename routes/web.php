<?php

use App\Livewire\Industri\Index as IndustriIndex;
use App\Livewire\Pkl\Index as PklIndex;
use App\Livewire\Guru\Index as GuruIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth',
    config('jetstream.auth_session'),
    'verified',
    'role:siswa',
    'check_user_email',
    'check_role_user',
])->group(function () {
    Route::get('/pkl', PklIndex::class)->name('pkl.index');   
    Route::get('/industri', IndustriIndex::class)->name('industri.index');
    Route::get('/guru', GuruIndex::class)->name('guru.index');

});
