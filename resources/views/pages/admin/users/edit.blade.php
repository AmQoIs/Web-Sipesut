@extends('layouts.admin')

@section('content')
    <div class="my-5">

        @php
            $links = [
                (object) ['link' => '/admin/users', 'name' => 'Pengguna'],
                (object) ['link' => '', 'name' => 'Edit Pengguna'],
            ];
        @endphp

        <div class="px-4 py-4 md:px-6 2xl:px-11">
            <x-breadcrumb :links="$links"></x-breadcrumb>
        </div>

        <h1 class="text-center text-3xl font-bold">Edit Profile</h1>
        <div class="flex justify-center w-full mb-8">
            <form action="{{ route('admin.users.edit', ['id' => $user->id]) }}" id="edit-profile" method="POST"
                class="flex flex-col gap-4 w-full max-w-xl px-8">
                @method('POST')
                @csrf
                <!--Nama-->
                <div>
                    <x-input-label for="nama" :value="__('Nama')" />
                    <input id="nama"
                        class="block mt-1 w-full border-primary focus:border-primary focus:ring-[#E6694E] rounded-full shadow-sm text-black bg-white"
                        type="text" name="nama" required autofocus placeholder="Masukkan Nama akun Baru"
                        value="{{ $user->nama }}" />
                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <!--Email-->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <input id="email"
                        class="block mt-1 w-full border-primary focus:border-primary focus:ring-[#E6694E] rounded-full shadow-sm text-black bg-white"
                        type="text" name="email" required autofocus placeholder="TNI@gmail.com"
                        value="{{ $user->email }}" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <!--Role-->
                <div>
                    <x-input-label for="role" :value="__('Role')" />
                    <select name="role"
                        class="select select-bordered w-full bg-white border-primary focus:ring-primary focus:border-primary rounded-3xl"
                        id="role" required>
                        <option disabled>Pilih Role</option>
                        <option value="1" {{ $user->role == 'ADMIN' ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ $user->role == 'ANGGOTA' ? 'selected' : '' }}>Anggota</option>
                    </select>
                </div>

                 <!--Pangkat Kerja-->
                 <div>
                    <x-input-label for="pangkat-kerja" :value="__('Pangkat Kerja')" />
                    <input id="pangkat-kerja"
                        class="block mt-1 w-full border-primary focus:border-primary focus:ring-[#E6694E] rounded-full shadow-sm text-black bg-white"
                        type="text" name="pangkat_kerja"  autofocus
                        value="{{ $user->pangkat_kerja }}" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    @if (session('fail'))
                        <p class="text-red-500 mt-1">{{ session('fail') }}</p>
                    @endif
                </div>

                <div class="flex justify-center items-center gap-4">

                    <button id="submit" type="button" onclick="send()"
                        class="btn btn-primary text-white rounded-3xl shadow-[inset_0px_2px_4px_0px_#fff,inset_0px_-2px_4px_0px_#fff,0px_-2px_16px_0px_#fff,0px_2px_16px_0px_#fff] duration-200 hover:translate-y-[5%] active:translate-y-[7%] active:shadow-[inset_0px_-2px_4px_0px_#fff,inset_0px_2px_4px_0px_#fff,0px_2px_16px_0px_#e8c8b0,0px_2px_16px_0px_#fff]">
                        Edit Profil
                    </button>
                </div>
            </form>
        </div>

        <h1 class="text-center text-3xl font-bold block mx-auto">Ganti Password</h1>
        <div class="flex justify-center w-full">
            <form id="change-password" action={{ route('anggota.users.change-password', ['id' => $user->id]) }}
                method="post" class="flex flex-col gap-4 w-full max-w-xl px-8">
                @method('POST')
                @csrf
                <!--password Lama-->
                <div>
                    <x-input-label class="block my-2 text-sm text-gray-600" for="old" :value="__('Password Lama')" />

                    <div class="relative" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" id="old" name="old"
                            placeholder="Masukkan Password Lama"
                            class="w-full border-primary focus:border-primary focus:ring-[#E6694E] rounded-full shadow-sm text-primary bg-white"
                            required>
                        <button type="button" @click="show = !show" class="absolute top-2 right-5 w-[1.5em] text-primary">
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6">
                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                <path fill-rule="evenodd"
                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6">
                                <path
                                    d="M1.324 11.447C2.81 6.976 7.028 3.75 12 3.75c4.97 0 9.186 3.223 10.675 7.69.12.361.12.75 0 1.112-1.488 4.47-5.705 7.696-10.675 7.696-4.97 0-9.186-3.222-10.676-7.69a1.764 1.764 0 0 1 0-1.112Zm9.476 1.893a3.752 3.752 0 1 0 5.304-5.304l-5.304 5.304Zm6.268-6.268a5.252 5.252 0 0 1-7.421 7.421l-3.6 3.601a.75.75 0 0 1-1.061-1.06l3.6-3.602a5.252 5.252 0 0 1 7.421-7.421l3.6-3.601a.75.75 0 0 1 1.06 1.06l-3.6 3.601Z" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    @if (session('wrongpassword'))
                        <p class="text-red-400 mt-1 text-sm">{{ session('wrongpassword') }}</p>
                    @endif
                </div>

                <!--Password baru-->
                <div>
                    <x-input-label class="block my-2 text-sm text-gray-600" for="new" :value="__('Password Baru')" />

                    <div class="relative" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" id="new" name="new"
                            placeholder="Masukkan Password Baru"
                            class="w-full border-primary focus:border-primary focus:ring-[#E6694E] rounded-full shadow-sm text-primary bg-white"
                            required>
                        <button type="button" @click="show = !show" class="absolute top-2 right-5 w-[1.5em] text-primary">
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6">
                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                <path fill-rule="evenodd"
                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6">
                                <path
                                    d="M1.324 11.447C2.81 6.976 7.028 3.75 12 3.75c4.97 0 9.186 3.223 10.675 7.69.12.361.12.75 0 1.112-1.488 4.47-5.705 7.696-10.675 7.696-4.97 0-9.186-3.222-10.676-7.69a1.764 1.764 0 0 1 0-1.112Zm9.476 1.893a3.752 3.752 0 1 0 5.304-5.304l-5.304 5.304Zm6.268-6.268a5.252 5.252 0 0 1-7.421 7.421l-3.6 3.601a.75.75 0 0 1-1.061-1.06l3.6-3.602a5.252 5.252 0 0 1 7.421-7.421l3.6-3.601a.75.75 0 0 1 1.06 1.06l-3.6 3.601Z" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    @if (session('wrongpassword'))
                        <p class="text-red-400 mt-1 text-sm">{{ session('wrongpassword') }}</p>
                    @endif
                </div>

                <div class="flex justify-center items-center gap-4">
                    <button id="submit-pass" type="button" onclick="password()"
                        class="btn btn-primary text-white rounded-3xl shadow-[inset_0px_2px_4px_0px_#fff,inset_0px_-2px_4px_0px_#fff,0px_-2px_16px_0px_#fff,0px_2px_16px_0px_#fff] duration-200 hover:translate-y-[5%] active:translate-y-[7%] active:shadow-[inset_0px_-2px_4px_0px_#fff,inset_0px_2px_4px_0px_#fff,0px_2px_16px_0px_#e8c8b0,0px_2px_16px_0px_#fff]">
                        Ganti Password
                    </button>
                    <button name="back" type="button" onclick="history.back()"
                        class="btn btn-primary btn-outline rounded-3xl">Kembali</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function send() {
            Swal.fire({
                title: "Anda yakin untuk mengedit profile?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('edit-profile');
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
                                    location.reload();
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

        function password() {
            Swal.fire({
                title: "Anda yakin untuk mengganti password?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('change-password');
                    const formData = new FormData(form);

                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelectorAll('input[name="_token"]')[1].value,
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
                                    location.reload();
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
                            console.log(error);
                            Swal.fire({
                                title: "Gagal!",
                                text: "Password gagal diubah, periksa lagi password Anda!",
                                icon: "error"
                            });
                        });
                }
            });
        }
    </script>
@endsection
