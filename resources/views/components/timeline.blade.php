<div>
    <div class="relative">
        <div class="border-l-2 border-gray-200 absolute h-full left-0"></div>

        @foreach ($riwayats as $index => $riwayat)
            <div class="mb-5 flex items-center">
              
              @if ($index === count($riwayats) - 1)
                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white absolute left-0 transform -translate-x-1/2">
              @else
              <div class="w-8 h-8 bg-gray-500 rounded-full flex items-center justify-center text-white absolute left-0 transform -translate-x-1/2">
              @endif

              @if($riwayat->detail_aktivitas !== 'Menerima_surat' && $riwayat->detail_aktivitas !== 'Menolak_surat' && $index !== 0)
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                </svg>
              @else 
                
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path d="M3.5 2.75a.75.75 0 0 0-1.5 0v14.5a.75.75 0 0 0 1.5 0v-4.392l1.657-.348a6.449 6.449 0 0 1 4.271.572 7.948 7.948 0 0 0 5.965.524l2.078-.64A.75.75 0 0 0 18 12.25v-8.5a.75.75 0 0 0-.904-.734l-2.38.501a7.25 7.25 0 0 1-4.186-.363l-.502-.2a8.75 8.75 0 0 0-5.053-.439l-1.475.31V2.75Z" />
              </svg>
              
              @endif
                
                </div>
                <div class="ml-12">
                   
                    @if($index === count($riwayats) - 1)
                      <div class="flex space-x-5">
                        <h4 class="text-lg font-semibold">{{ $riwayat->user->nama }} {{ str_replace('_', ' ', $riwayat->detail_aktivitas) }}</h4>
                        <span class="bg-success text-success bg-opacity-10 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded border">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                        </svg>
                        Terbaru
                      </span>
                      </div>
                    @else 
                    <h4 class="text-lg font-semibold">{{ $riwayat->user->nama }} {{ str_replace('_', ' ', $riwayat->detail_aktivitas) }}</h4>
                    @endif

                    @if($riwayat->komentar)
                    <p class="text-gray-600">{{ $riwayat->komentar }}.</p>
                    @endif
                    <p class="text-sm text-gray-400">{{ \Carbon\Carbon::parse($riwayat->created_at)->locale('id')->translatedFormat('d F Y H:i:s') }}</p>
                </div>
            </div>            
        @endforeach


    </div>
</div>