<div class="py-6"> 
    <div class="container mx-auto px-2">
        {{-- Header --}}
        <div class="p-4 bg-white container mx-auto px-2 rounded-lg bg-gray-100 shadow space-y-4">
            {{-- Header: Search & Tambah --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <input
                    wire:model.live="search"
                    type="text"
                    placeholder="Cari Industri..."
                    class="w-1/2 sm:w-1/2 px-4 ml-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400"
                >

                <button wire:click="create()"
                    class="px-4 py-2 mr-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                >
                    + Tambah Industri
                </button>

                @if($isOpen)
                    @include('livewire.industri.create')
                @endif
            </div>

            {{-- Grid Card Industri --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @php
                    use Carbon\Carbon;
                    $no = 0;
                @endphp
                {{-- Card Industri --}}
                @foreach($industris as $key => $industri)
                <div class="flex flex-col sm:flex-row bg-gray-100 rounded-xl overflow-hidden shadow-md ml-4 mr-4 mt-3">
                    <div class="sm:w-1/3 w-full">
                        <img src="{{ $industri->foto ? asset('storage/foto' . $industri->foto) : asset('storage/foto/industri.png') }}"
                            alt="Foto Industri"
                            class="object-cover w-sm h-sm {{ $industri->foto ? '' : 'blur-sm' }}"
                        >
                    </div>
                    <div class="sm:w-2/3 w-full p-4 space-y-2">
                        <h2 class="text-2xl font-semibold text-gray-800 ">{{ $industri->nama }}</h2>
                        <p class="text-gray-600 text-sm">Bidang Usaha: {{ $industri->bidang_usaha }}</p>
                        <p class="text-gray-500 text-md">Alamat: {{ $industri->alamat }}</p>
                        <p class="text-gray-500 text-md">Kontak: {{ $industri->kontak }} | {{ $industri->email }} | {{ $industri->website }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- pagination --}}
            <div class="p-4">
                {{ $industris->links() }}
            </div>
        </div>
    </div>
</div>