<div class="py-6"> 
    <div class="container mx-auto px-2">
        {{-- Header --}}
        <div class="p-4 bg-white container mx-auto px-2 rounded-lg bg-gray-100 shadow space-y-4">
            {{-- Header: Search & Tambah --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <input
                    wire:model.live="search"
                    type="text"
                    placeholder="Cari Guru..."
                    class="w-1/2 sm:w-1/2 px-4 ml-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
            </div>

            {{-- Grid Card Guru --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {{-- Card Guru --}}
                @foreach($gurus as $key => $guru)
                <div class="flex flex-col sm:flex-row bg-gray-100 rounded-xl overflow-hidden shadow-sm ml-4 mr-4">
                    <div class="sm:w-1/3 w-full">
                    <img
                        <img src="{{ $guru->foto ? asset('storage/foto/' . $guru->foto) : asset('storage/foto/profile.png') }}" 
                        alt="Foto Guru"
                        class="object-cover w-full h-full"  >               
                    </div>
                    <div class="sm:w-2/3 w-full p-4 space-y-2 mt-6">
                        <h2 class="text-xl font-semibold text-gray-800 ">{{ $guru->nama }}</h2>
                        <p class="text-gray-600 text-sm">NIP : {{ $guru->nip }}</p>
                        <p class="text-gray-500 text-sm">Alamat: {{ $guru->alamat }}</p>
                        <p class="text-gray-500 text-sm">Kontak: {{ $guru->kontak }} | {{ $guru->email }} </p>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- pagination --}}
            <div class="p-4">
                {{ $gurus->links() }}
            </div>
        </div>
    </div>
</div>