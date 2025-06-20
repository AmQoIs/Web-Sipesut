@extends('layouts.admin')

@section('content')
    <h3 class="font-bold text-3xl text-black text-center mt-12">Daftar Akun</h3>
    <div class="flex justify-end mt-8 md:px-[5%]" x-data="{ isOpen: false }">
        <a href="/admin/users/create" class="btn btn-success text-white"> <svg xmlns="http://www.w3.org/2000/svg" width="32"
                height="32" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M15 14c-2.67 0-8 1.33-8 4v2h16v-2c0-2.67-5.33-4-8-4m-9-4V7H4v3H1v2h3v3h2v-3h3v-2m6 2a4 4 0 0 0 4-4a4 4 0 0 0-4-4a4 4 0 0 0-4 4a4 4 0 0 0 4 4" />
            </svg> <span class="hidden md:inline">Tambah Akun</span></a>
    </div>
    <div class="container mx-auto px-4 py-8e">
        <table id="myTable" class="table py-5">
            <thead class="bg-primary text-white">
                <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Pangkat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>

    <style>
        .data-table tbody tr:hover {
            background-color: #8d8d8d;
            color: #fff
        }

        select {
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e);
            background-position: right -.2rem center !important;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 1rem;
            -webkit-print-color-adjust: exact;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url()->current() }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama',
                        name: 'Nama'
                    },
                    {
                        data: 'email',
                        name: 'Email'
                    },
                    {
                        data: 'role',
                        name: 'Role'
                    },
                    {
                        data: 'pangkat_kerja',
                        name: 'Pangkat Kerja'
                    },
                    {
                        data: 'action',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    },
                ],

                columnDefs: [{
                        width: '10%',
                        targets: 0
                    },
                    {
                        width: '20%',
                        targets: 1
                    },
                    {
                        width: '20%',
                        targets: 2
                    },
                    {
                        width: '20%',
                        targets: 3
                    },
                    {
                        width: '20%',
                        targets: 4
                    },
                    {
                        width: '10%',
                        targets: 5
                    },

                ]
            })
        })

        function send(id) {
            const buttons = document.querySelectorAll('button.bg-error')
            const looked = document.getElementById(`sub${id}`);

            let index = 0;

            buttons.forEach((currentIndex, i) => {
                if (looked == currentIndex) {
                    index = i
                }
            })

            Swal.fire({
                title: "Anda yakin untuk menghapus akun ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById(`del${id}`);
                    const formData = new FormData(form);

                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelectorAll('input[name="_token"]')[index].value,
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
                                    window.location.href = `/admin/users`;
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
@endsection
