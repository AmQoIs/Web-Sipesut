@if ($surat->status === 'REVISI' && !$surat->apakah_sudah_revisi)
    <h1 class="text-secondary bg-secondary bg-opacity-10 px-4 py-2 rounded-full w-fit">Sedang dalam proses revisi</h1>

@elseif ($surat->status !== 'DITERIMA' && $surat->status !== 'DITOLAK')
    <div class="flex w-full space-x-5">


    {{-- Ubah Status Surat --}}
    <div class="bg-white shadow rounded h-min w-1/2">
        <div class="bg-green-500 text-white p-4 rounded-t">
            <h2 class="text-xl font-semibold">Ubah Status Surat</h2>
        </div>

        <div class="p-4">
            <form id="ubahStatusForm" action="{{ route('admin.surat.ubah_status', ['id' => $surat->id]) }}" method="POST">
                @csrf
                <p class="text-black font-bold required">Status Surat</p>
                <p class="text-blackgray text-sm mb-2">Ubah status surat saat ini</p>
                <div class="flex space-x-5">
                    <div class="flex items-center">
                        <input id="revisi" type="radio" value="revisi" name="status" class="w-4 h-4 text-blue-600 bg-text border-gray-700 focus:ring-blue-500">
                        <label for="revisi" class="ms-2 text-sm text-black">Minta revisi</label>
                    </div>
                    <div class="flex items-center">
                        <input id="terima" type="radio" value="terima" name="status" class="w-4 h-4 text-blue-600 bg-text border-gray-700 focus:ring-blue-500">
                        <label for="terima" class="ms-2 text-sm text-black">Terima</label>
                    </div>
                </div>

                @php
                    $placeholder = "Tambahkan catatan jika perlu";
                @endphp

                <div class="mt-5">
                    <x-textarea name="komentar" :placeholder="$placeholder">Catatan</x-textarea>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="button" onclick="konfirmUbahStatus()" class="bg-success text-white rounded-md px-5 py-2">Ubah</button>
                </div>
            </form>
        </div>
    </div>


    {{-- Tolak Card --}}
    <div class="bg-white shadow rounded h-min w-1/2">


        <div class="bg-red-500 text-white p-4 rounded-t">
            <h2 class="text-xl font-semibold">Tolak Surat</h2>
        </div>

        @php
            $placeholder = "Tulis alasan menolak disini";
        @endphp

        <div class="p-4">
          <form id="tolakForm" action="{{ route('admin.surat.tolak', ['id' => $surat->id]) }}" method="POST">
            @csrf
            <x-textarea class="required" name="komentar" :placeholder="$placeholder">Alasan</x-textarea>
            <div class="flex justify-end mt-4">
                <button type="button" onclick="konfirmTolak()" class="bg-danger text-white rounded-md px-5 py-2">Tolak</button>
            </div>
          </form>
        </div>
      </div>
    </div>

@elseif ($surat->status == 'DITERIMA')
    <x-update-surat :surat="$surat" :errors="$errors"></x-riwayat-surat-card>
@else
    <h1 class="text-secondary bg-secondary bg-opacity-10 px-4 py-2 rounded-full w-fit">Anda sudah tidak dapat mengubah status surat</h1>
@endif
