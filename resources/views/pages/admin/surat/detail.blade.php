@php
    $link = explode('/', $surat->nama_file);
@endphp

@extends('layouts.admin')

@section('content')
    <div class="px-4 py-4 md:px-6 2xl:px-11">

        @php
            $links = [
                (object) ['link' => '/admin/surat', 'name' => 'Surat'],
                (object) ['link' => '', 'name' => 'Detail Surat'],
            ];
        @endphp

        <x-breadcrumb :links="$links"></x-breadcrumb>

        <h1 class="text-primary text-5xl my-5">Detail Surat {{ $surat->no_surat }}</h1>

    <div class="grid grid-cols-1 gap-6 mt-6">
        <x-tabs :surat="$surat" :riwayats="$riwayats"></x-tabs>
    </div>
</div>

    <script>
        function konfirmTolak() {
            Swal.fire({
                title: "Anda yakin menolak surat?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('tolakForm');
                    const formData = new FormData(form);

                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                'Accept': 'application/json',
                            },
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
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
                                text: "Something went wrong!",
                                icon: "error"
                            });
                        });
                }
            });
        }


        function konfirmUbahStatus() {
            Swal.fire({
                title: "Anda yakin mengubah status surat?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('ubahStatusForm');
                    const formData = new FormData(form);

                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                'Accept': 'application/json',
                            },
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
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
                                text: "Something went wrong!",
                                icon: "error"
                            });
                        });
                }
            });
        }
    </script>
@endsection
