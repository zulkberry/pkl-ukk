<div class="fixed inset-0 z-10 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
          
          <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="py-4 px-4">
              <h2 class="font-semibold text-gray-900 ">Tambah Data Industri</h2>
              <p class="text-gray-700 ">Kontributor: {{ $siswa_login->nama ?? 'Tidak ditemukan' }}</p>
              <div class="border-t border-gray-300  my-2"></div>
            </div>
            <form>
              <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                <fieldset class="border border-gray-800 rounded-md p-4">
                  <legend class="text-lg text-gray-700 px-2">Identitas Industri</legend>
          
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Nama</label>
                        <input wire:model="indNama" type="text" class="mt-1 p-2 border rounded-md w-full bg-white focus:ring focus:ring-blue-300 focus:outline-none">
                        @error('indNama') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Bidang Usaha</label>
                        <textarea wire:model="indBidangUsaha" class="mt-1 p-2 border rounded-md w-full bg-white border-gray-800 focus:ring focus:ring-blue-300 focus:outline-none" rows="3"></textarea>
                        @error('indBidangUsaha') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Alamat</label>
                        <textarea wire:model="indAlamat" class="mt-1 p-2 border rounded-md w-full bg-white  border-gray-800 focus:ring focus:ring-blue-300 focus:outline-none" rows="3"></textarea>
                        @error('indAlamat') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Kontak</label>
                        <input wire:model="indKontak" type="text" class="mt-1 p-2 border rounded-md w-full bg-white border-gray-800 focus:ring focus:ring-blue-300 focus:outline-none">
                        @error('indKontak') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Email</label>
                        <input wire:model="indEmail" type="email" class="mt-1 p-2 border rounded-md w-full bg-white border-gray-800 focus:ring focus:ring-blue-300 focus:outline-none">
                        @error('indEmail') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Website</label>
                        <input wire:model="indWebsite" type="url" class="mt-1 p-2 border rounded-md w-full bg-white border-gray-800 focus:ring focus:ring-blue-300 focus:outline-none">
                        @error('indWebsite') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <label class="block mb-2 text-sm font-bold text-gray-700">Foto Industri</label>
                    <div class="flex items-center justify-center w-full">
                      <label for="dropzone-file"
                          class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-800 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 overflow-hidden">
                  
                          @if ($indFoto)
                              <img src="{{ $indFoto->temporaryUrl() }}"
                                  class="absolute" alt="Preview Foto Industri" />
                          @else
                              <div class="flex flex-col items-center justify-center pt-5 pb-6 z-10">
                                  <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true"
                                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                  </svg>
                                  <p class="mb-2 text-sm text-gray-500 ">
                                      <span class="font-semibold">Click to upload</span> or drag and drop
                                  </p>
                                  <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                              </div>
                          @endif
                  
                          <input wire:model="indFoto" id="dropzone-file" type="file" class="hidden" />
                      </label>
                  
                      @error('indFoto')
                          <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                      @enderror
                  </div>
                  
                </fieldset>
              </div>
          
              <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                  <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green rounded-md shadow-sm sm:text-sm sm:leading-5">
                    Save
                  </button>
                </span>
                <span class="flex w-full mt-3 rounded-md shadow-sm sm:mt-0 sm:w-auto">
                  <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-gray-800 transition duration-150 ease-in-out bg-white border border-gray-800 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5">
                    Cancel
                  </button>
                </span>
              </div>
            </form>
          </div>          
          
      </div>
    </div>
</div>