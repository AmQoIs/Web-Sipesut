<x-guest-layout>
    <div class="flex flex-col justify-center items-center mt-32 mb-12">
        <h1 class="text-3xl font-bold">Upload Surat</h1>
        <div class="flex justify-center w-full">

            <form action="/surat/upload" id="surat" method="POST" class="flex flex-col gap-4 w-full max-w-xl px-8"
                enctype="multipart/form-data" x-data="{ isOn: false }">
                @method('POST')
                @csrf
                <!--Judul Surat-->
                <div>
                    <x-input-label for="judul" :value="__('Judul Surat')" />
                    <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul"
                        :value="old('judul')" required autofocus placeholder="Masukkkan judul surat" />
                    <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <!--Nomor Surat-->
                <div>
                    <x-input-label for="nomor" :value="__('Nomor Surat')" />
                    <x-text-input id="nomor" class="block mt-1 w-full" type="text" name="nomor"
                        :value="old('nomor')" required autofocus placeholder="Masukkan nomor surat" />
                    <x-input-error :messages="$errors->get('nomor')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <!--Dari-->
                <div>
                    <x-input-label for="dari" :value="__('Dari')" />
                    <x-text-input id="dari" class="block mt-1 w-full" type="text" name="dari"
                        :value="old('dari')" required autofocus placeholder="Masukkan pengirim surat" />
                    <x-input-error :messages="$errors->get('kepada')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <!--Tujuan Surat-->
                <div>
                    <x-input-label for="kepada" :value="__('Tujuan Surat')" />
                    <x-text-input id="kepada" class="block mt-1 w-full" type="text" name="kepada"
                        :value="old('kepada')" required autofocus placeholder="Masukkan pengirim surat" />
                    <x-input-error :messages="$errors->get('kepada')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <!--Perihal Surat-->
                <div>
                    <x-input-label for="perihal" :value="__('Perihal Surat')" />
                    <x-text-input id="perihal" class="block mt-1 w-full" type="text" name="perihal"
                        :value="old('perihal')" required autofocus placeholder="Masukkan perihal surat" />
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
                        <option disabled selected>Tipe Surat</option>
                        <option value="1">Surat Biasa</option>
                        <option value="2">Nota Dinas</option>
                        <option value="3">Surat Perintah</option>
                        <option value="4">Surat Edaran</option>
                    </select>
                </div>

                <!--File Upload-->
                <div>
                    <x-input-label for="file" :value="__('File Surat')" />
                    <input type="file" name="file" id="file" accept=".pdf"
                        class="file-input file-input-primary file-input-bordered border-primary bg-white rounded-3xl w-full" />
                    <x-input-error :messages="$errors->get('perihal')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <div class="flex justify-center items-center gap-4">
                    <button id="submit" type="button" onclick="send()"
                        class="btn btn-primary text-white rounded-3xl shadow-[inset_0px_2px_4px_0px_#fff,inset_0px_-2px_4px_0px_#fff,0px_-2px_16px_0px_#fff,0px_2px_16px_0px_#fff] duration-200 hover:translate-y-[5%] active:translate-y-[7%] active:shadow-[inset_0px_-2px_4px_0px_#fff,inset_0px_2px_4px_0px_#fff,0px_2px_16px_0px_#e8c8b0,0px_2px_16px_0px_#fff]">
                        Submit
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
                title: "Anda yakin untuk mengirim surat?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('surat');
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
                                    window.location.href = '/surat';
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
