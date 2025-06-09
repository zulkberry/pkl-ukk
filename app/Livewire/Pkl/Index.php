<?php

namespace App\Livewire\Pkl;

use App\Models\Pkl;
use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Industri;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination;

    public $siswa_id, $industri_id, $guru_id, $mulai, $selesai;
    public $isOpen = false;
    public $rowPerPage = 3;
    public $search;
    public $userMail;

    public $progress = 0;

    public function mount()
    {
        $this->userMail = Auth::user()->email;
    }

    public function render()
    {
        $query = Pkl::latest();
    
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->whereHas('siswa', function ($query) {
                    $query->where('nama', 'like', '%' . $this->search . '%');
                })->orWhereHas('industri', function ($query) {
                    $query->where('nama', 'like', '%' . $this->search . '%');
                });
            });
        }
    
        return view('livewire.pkl.index', [
            'pkls' => $query->paginate($this->rowPerPage),
            'siswa_login' => Siswa::where('email', '=', $this->userMail)->first(),
            'industri' => Industri::all(),
            'guru' => Guru::all(),
        ]);
    }
    

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal() { $this->isOpen = true; }

    public function closeModal() { $this->isOpen = false; }

    private function resetInputFields()
    {
        $this->siswa_id = $this->industri_id = $this->guru_id = $this->mulai = $this->selesai = '';
    }

    public function store()
    {
        $this->validate([
            'siswa_id'     => 'required',
            'industri_id'  => 'required',
            'guru_id'      => 'required',
            'mulai'        => 'required|date',
            'selesai'      => 'required|date|after:mulai',
        ]);

        DB::beginTransaction();

        try {
            $siswa = Siswa::find($this->siswa_id);

            if (!$siswa) {
                DB::rollBack();
                $this->closeModal();
                return redirect()->route('pkl.index')->with('error', 'Siswa tidak ditemukan.');
            }
            
            if ($siswa->status) {
                DB::rollBack();
                $this->closeModal();
                return redirect()->route('pkl.index')->with('error', 'Transaksi dibatalkan: Siswa sudah melapor.');
            }

            Pkl::create([
                'siswa_id'     => $this->siswa_id,
                'industri_id'  => $this->industri_id,
                'guru_id'      => $this->guru_id,
                'mulai'        => $this->mulai,
                'selesai'      => $this->selesai,
            ]);

            DB::commit();
            $this->closeModal();
            $this->resetInputFields();
            return session()->flash('success', 'Data PKL berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->closeModal();
            return redirect()->route('pkl.index')->with('error', 'Transaksi dibatalkan: Siswa sudah melapor.');
        }
    }
}
