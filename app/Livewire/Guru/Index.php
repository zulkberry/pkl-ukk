<?php

namespace App\Livewire\Guru;

use App\Models\Siswa;
use Livewire\Component;
use App\Models\Guru;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $rowPerPage = 4;
    public $search;
    public $userMail;

    public function mount()
    {
        // Membaca email user yang sedang login
        $this->userMail = Auth::user()->email;
    }

    public function render()
    {
        return view('livewire.guru.index', [
            'gurus' => $this->search === null
                ? Guru::latest()->paginate($this->rowPerPage)
                : Guru::latest()
                    ->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('nip', 'like', '%' . $this->search . '%')
                    ->orWhere('alamat', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->paginate($this->rowPerPage),

            'siswa_login' => Siswa::where('email', '=', $this->userMail)->first(),
        ]);
    }
}
