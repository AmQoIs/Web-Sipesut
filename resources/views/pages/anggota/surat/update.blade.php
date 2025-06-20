<x-guest-layout>
    <div class="flex flex-col justify-center items-center mt-32 mb-12">
        <h1 class="text-3xl font-bold">Revisi Surat</h1>
        <div class="flex justify-center w-full">

            <form action="{{ route('anggota.surat.edit-post', ['id' => $surat->id]) }}" id="edit-surat" method="POST"
                class="flex flex-col gap-4 w-full max-w-xl px-8" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <!--Judul Surat-->
                <div>
                    <x-input-label for="judul" :value="__('Judul Surat')" />
                    <input id="judul"
                        class="block mt-1 w-full border-primary focus:border-primary focus:ring-[#E6694E] rounded-full shadow-sm text-black bg-white"
                        type="text" name="judul" value="{{ $surat->judul }}" required autofocus
                        placeholder="Surat Pengunduran Diri" />
                    <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <!--Nomor Surat-->
                <div>
                    <x-input-label for="nomor" :value="__('Nomor Surat')" />
                    <input id="nomor"
                        class="block mt-1 w-full border-primary focus:border-primary focus:ring-[#E6694E] rounded-full shadow-sm text-black bg-white"
                        type="text" name="nomor" value="{{ $surat->no_surat }}" required autofocus
                        placeholder="623456789" />
                    <x-input-error :messages="$errors->get('nomor')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <!--Dari-->
                <div>
                    <x-input-label for="dari" :value="__('Dari')" />
                    <input id="dari"
                        class="block mt-1 w-full border-primary focus:border-primary focus:ring-[#E6694E] rounded-full shadow-sm text-black bg-white"
                        type="text" name="dari" value="{{ $surat->dari }}" required autofocus
                        placeholder="Masukkan pengirim surat" />
                    <x-input-error :messages="$errors->get('kepada')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <!--Tujuan Surat-->
                <div>
                    <x-input-label for="kepada" :value="__('Tujuan Surat')" />
                    <input id="kepada"
                        class="block mt-1 w-full border-primary focus:border-primary focus:ring-[#E6694E] rounded-full shadow-sm text-black bg-white"
                        type="text" name="kepada" value="{{ $surat->kepada }}" required autofocus
                        placeholder="Jenderal TNI" />
                    <x-input-error :messages="$errors->get('kepada')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <!--Perihal Surat-->
                <div>
                    <x-input-label for="perihal" :value="__('Perihal Surat')" />
                    <input id="perihal"
                        class="block mt-1 w-full border-primary focus:border-primary focus:ring-[#E6694E] rounded-full shadow-sm text-black bg-white"
                        type="text" name="perihal" value="{{ $surat->perihal }}"" required autofocus
                        placeholder="Pengunduran Diri" />
                    <x-input-error :messages="$errors->get('perihal')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <!--Tipe Surat-->
                <div>
                    <x-input-label for="tipe" :value="__('Tipe Surat')" />
                    <select name="tipe"
                        class="select select-bordered w-full bg-white border-primary focus:ring-primary focus:border-primary rounded-3xl"
                        id="tipe" required>
                        <option disabled>Tipe Surat</option>
                        <option value="1" {{ $surat->tipe_surat == 'SURAT_BIASA' ? 'selected' : '' }}>Surat Biasa
                        </option>
                        <option value="2" {{ $surat->tipe_surat == 'NOTA_DINAS' ? 'selected' : '' }}>Nota Dinas
                        </option>
                        <option value="3" {{ $surat->tipe_surat == 'SURAT_PERINTAH' ? 'selected' : '' }}>Surat
                            Perintah</option>
                        <option value="4" {{ $surat->tipe_surat == 'SURAT_EDARAN' ? 'selected' : '' }}>Surat
                            Edaran</option>
                    </select>
                </div>

                <!--File Upload-->
                <div>
                    <x-input-label for="file" :value="__('File Surat')" />
                    <input type="file" name="file" id="file" accept=".pdf" value={{ $surat->nama_file }}
                        class="file-input file-input-primary file-input-bordered border-primary bg-white rounded-3xl w-full" />
                    <x-input-error :messages="$errors->get('perihal')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <div class="flex justify-center items-center gap-4">

                    <button id="submit" type="button" onclick="send()"
                        class="btn btn-primary text-white rounded-3xl shadow-[inset_0px_2px_4px_0px_#fff,inset_0px_-2px_4px_0px_#fff,0px_-2px_16px_0px_#fff,0px_2px_16px_0px_#fff] duration-200 hover:translate-y-[5%] active:translate-y-[7%] active:shadow-[inset_0px_-2px_4px_0px_#fff,inset_0px_2px_4px_0px_#fff,0px_2px_16px_0px_#e8c8b0,0px_2px_16px_0px_#fff]">
                        Revisi
                    </button>
                    <button name="back" type="button" onclick="window.location.href = '/surat'"
                        class="btn btn-primary btn-outline rounded-3xl">Kembali</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function send() {
            Swal.fire({
                title: "Anda yakin untuk mengedit surat?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('edit-surat');
                    const formData = new FormData(form);

                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                'Accept': 'application/json',
                            },
                            body: formData,
                        })
                        .then(response => response.json()).then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: data.message,
                                    icon: "success"
                                }).then(() => {
                                    window.location.href = `/surat/${data.id}`;
                                });
                            } else {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: data.message,
                                    icon: "error"
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                title: "Error!",
                                text: "error!",
                                icon: "error"
                            });
                        });
                }
            });
        }
    </script>
</x-guest-layout>
