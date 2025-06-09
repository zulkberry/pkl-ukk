<?php

namespace App\Livewire\Pkl;

use Log;
use App\Models\Pkl;
use App\Models\Siswa;
use Livewire\Component;
use App\Models\Industri;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $siswa_id, $mulai, $selesai, $industri_id;
    public $siswa_login, $industris;
    public $isOpen = false;

    public function mount()
    {
        $this->siswa_login = Siswa::where('email', Auth::user()->email)->first();
        $this->industris = Industri::all();
        $this->isOpen = true;

        if ($this->siswa_login) {
            $this->siswa_id = $this->siswa_login->id;
        }
    }

    public function render()
    {
        return view('livewire.pkl.create');
    }

    private function resetInputFields()
    {
        $this->siswa_id = '';
        $this->industri_id = '';
        $this->mulai = '';
        $this->selesai = '';
    }

    

    public function store()
    {
        $this->validate([
            'siswa_id'    => 'required',
            'industri_id' => 'required',
            'mulai'       => 'required|date',
            'selesai'     => 'required|date|after:mulai',
        ]);
    
        // Hitung durasi antara mulai dan selesai
        $mulai = \Carbon\Carbon::parse($this->mulai);
        $selesai = \Carbon\Carbon::parse($this->selesai);
        $diffInDays = $selesai->diffInDays($mulai);
    
        if ($diffInDays < 90) {
            session()->flash('error', 'Durasi PKL minimal 90 hari.');
            return;  // hentikan proses simpan
        }
    
        try {
            $pkl = Pkl::create([
                'siswa_id'    => $this->siswa_id,
                'industri_id' => $this->industri_id,
                'mulai'       => $this->mulai,
                'selesai'     => $this->selesai,
            ]);
    
            session()->flash('success', 'Berhasil!');
            redirect()->route('pkl.index')->with('success', 'Data PKL berhasil ditambahkan.');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal: ' . $e->getMessage());
        }
    }
    
    public function closeModal()
    {
        $this->isOpen = false;
        $this->dispatch('closeModal');
    }
}
