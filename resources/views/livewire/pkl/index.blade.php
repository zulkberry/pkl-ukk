<div class="py-9">
    <div class="container mx-auto px-2">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            <!-- Kolom Riwayat Pengajuan (3/4) -->
            <div class="col-span-1 lg:col-span-3 bg-white p-4 rounded-lg shadow">
                {{-- isi Riwayat Pengajuan seperti sebelumnya --}}
                <div class="gap-4 min-h-[375px]">
                    {{-- Pesan --}}
                    <div>
                        @if (session()->has('error'))
                            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
                                class="p-4 bg-red-500 text-white rounded-md mb-4">
                                {{ session('error') }}
                            </div>
                        @endif
                
                        @if (session()->has('success'))
                            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
                                class="p-4 bg-green-500 text-white rounded-md mb-4">
                                {{ session('success') }}
                            </div>
                        @endif   
                    </div> 

                    <h2 class="text-xl font-semibold mb-4">Riwayat Pengajuan</h2>
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-4">
                        <!-- Search -->
                        <div class="w-full md:w-1/2">
                            <input
                                type="text"
                                placeholder="Cari data..."
                                wire:model.live="search"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>

                        <!-- Tombol Tambah Data -->
                        <div class="w-full md:w-auto text-right">
                            @if($siswa_login && !$pkls->where('siswa_id', $siswa_login->id)->count())
                                <button 
                                    wire:click="create()"
                                    class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition duration-200"
                                >
                                    + Tambah Data
                                </button>
                            @endif
                        </div>
                    </div>

                    {{-- Modal --}}
                    @if($isOpen)
                        @livewire('pkl.create', [
                            'siswa_login' => $siswa_login,
                            'pkls' => $pkls,
                            'industri' => $industri,
                            'isOpen' => $isOpen,
                        ])
                    @endif

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white mt-6">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-white text-center uppercase bg-blue-600">
                                <tr>
                                    <th class="px-6 py-3">Nama Siswa</th>
                                    <th class="px-6 py-3">Industri</th>
                                    <th class="px-6 py-3">Guru Pembimbing</th>
                                    <th class="px-6 py-3">Tanggal Mulai</th>
                                    <th class="px-6 py-3">Tanggal Selesai</th>
                                    <th class="px-6 py-3">Durasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                
                                use Carbon\Carbon; 
                                $no = 0; @endphp

                                @foreach($pkls as $pkl)
                                    @php
                                        $no++;
                                        $d1 = \Carbon\Carbon::parse($pkl->mulai);
                                        $d2 = \Carbon\Carbon::parse($pkl->selesai);
                                        $selisihHari = $d1->diffInDays($d2);

                                        $progress = 0;
                                        if ($pkl->mulai && $pkl->selesai) {
                                            $tanggalMulai = \Carbon\Carbon::parse($pkl->mulai);
                                            $tanggalSelesai = \Carbon\Carbon::parse($pkl->selesai);
                                            $hariTotal = $tanggalMulai->diffInDays($tanggalSelesai);

                                            $hariSekarang = now()->greaterThan($tanggalSelesai)
                                                ? $hariTotal
                                                : max(0, $tanggalMulai->diffInDays(now()));

                                            $progress = $hariTotal > 0 ? round(($hariSekarang / $hariTotal) * 100) : 0;
                                        }
                                    @endphp
                                    <tr class="border-b border-gray-300 hover:bg-gray-50 text-center">
                                        <th class="px-6 py-4">{{ $pkl->siswa->nama }}</th>
                                        <td class="px-6 py-4">{{ $pkl->industri->nama }}</td>
                                        <td class="px-6 py-4">
                                            @if ($pkl->guru)
                                                {{ $pkl->guru->nama }}
                                            @else
                                                <span class="text-gray-500">Belum ada guru pembimbing</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">{{ $pkl->mulai }}</td>
                                        <td class="px-6 py-4">{{ $pkl->selesai }}</td>
                                        <td class="px-6 py-4">{{ $selisihHari }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- pagination --}}
                        <div class="p-4">
                            {{ $pkls->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Profil (1/4) -->
            <div class="col-span-1 bg-white p-4 rounded-lg shadow text-center">
                <!-- Foto Siswa -->
                    <img src="{{ $siswa_login->foto ? asset('storage/' . $siswa_login->foto) : asset('storage/siswa-fotos/profile.png') }}" 
                        alt="Foto Siswa"
                        class="w-24 h-24 center mt-4 rounded-full mx-auto mb-4 object-cover shadow-lg" 
                    />
                <!-- Data Siswa -->
                <div class="text-gray-700 space-y-1">
                    <p class="font-semibold text-lg mt-3">{{ $siswa_login->nama }}</p>
                    <p class="text-sm">{{ $siswa_login->nis }}</p>
                    <p class="text-sm">{{ $siswa_login->alamat }}</p>
                    <p class="text-sm">{{ $siswa_login->kontak }} | {{ $siswa_login->email }}</p>
                </div>
            
                <!-- Progress PKL -->
                <div class="mt-6">
                    <p class="font-medium text-sm mb-2">Progress PKL</p>
                    @if(is_null($progress) || $progress == 0)
                        <p class="text-sm text-red-600">Belum melakukan PKL</p>
                    @else
                        <div class="w-full bg-gray-200 rounded-full h-4 relative">
                            <div class="bg-blue-600 h-4 rounded-full transition-all duration-300 flex items-center justify-center text-xs font-semibold text-white"
                                 style="width: {{ $progress }}%">
                                @if($progress >= 15)
                                    {{ $progress }}%
                                @endif
                            </div>
                            @if($progress < 15)
                                <span class="absolute left-2 top-1/2 -translate-y-1/2 text-xs text-gray-700 font-semibold">
                                    {{ $progress }}%
                                </span>
                            @endif
                        </div>
                    @endif
                </div>                
            </div>            
        </div>
    </div>
</div>
