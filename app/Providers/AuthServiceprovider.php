<?php

namespace App\Providers;

use App\Models\Pkl;
use App\Models\Guru;
use App\Models\Role;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Industri;
use App\Policies\PklPolicy;
use App\Policies\GuruPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\SiswaPolicy;
use App\Policies\IndustriPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Siswa::class => SiswaPolicy::class,
        Guru::class => GuruPolicy::class,
        Pkl::class => PklPolicy::class,
        Industri::class => IndustriPolicy::class,
        Role::class => RolePolicy::class, // kalau kamu buat custom
    ];
    

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}