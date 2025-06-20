<x-guest-layout>
    <div class="py-4 px-4 mt-32 mb-12">
        <h1 class="font-bold text-center text-3xl">Daftar Surat</h1>

        <!--Summary-->
        {{-- <div class="mt-4">
            <x-summary></x-summary>
        </div> --}}

        <div class="flex justify-end mt-8 md:px-[5%]" x-data="{ isOpen: false }">
            <a href="/surat/upload" class="btn btn-primary text-white"> <svg xmlns="http://www.w3.org/2000/svg"
                    width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="m2 21l21-9L2 3v7l15 2l-15 2z" />
                </svg> <span class="hidden md:inline">Kirim Surat Baru</span></a>
        </div>

        <!--hasil-->
        <div class="container mx-auto py-8 md:px-[5%] overflow-x-auto">
            <select id="filterStatus" class="form-control mb-3">
                <option value="">Semua</option>
                <option value="DITERIMA">Diterima</option>
                <option value="DITOLAK">Ditolak</option>
                <option value="REVISI">Revisi</option>
                <option value="BELUM_DICEK">Belum Dicek</option>
            </select>

            <table id="myTable" class="table table-zebra py-5 static">
                <thead class="bg-primary text-white rounded-lg">
                    <tr>
                        <th>No Surat</th>
                        <th>Tipe Surat</th>
                        <th>Judul</th>
                        <th>Dari</th>
                        <th>Perihal</th>
                        <th>Kepada</th>
                        <th>Status</th>
                        <th>Tanggal Diterima</th>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/id.js"></script>




        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ url()->current() }}",
                        data: function(d) {
                            d.status = $('#filterStatus').val();
                        }
                    },
                    columns: [{
                            data: 'no_surat',
                            name: 'no_surat'
                        },
                        {
                            data: 'tipe_surat',
                            name: 'tipe_surat'
                        },
                        {
                            data: 'judul',
                            name: 'judul'
                        },
                        {
                            data: 'dari',
                            name: 'dari'
                        },
                        {
                            data: 'perihal',
                            name: 'perihal'
                        },
                        {
                            data: 'kepada',
                            name: 'kepada'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'accepted_at',
                            name: 'Diterima Pada',
                            render: function(data, type, row) {
                                if (data) {
                                    moment.locale('id');

                                    // Format the date in the desired format
                                    return moment(data).format('dddd, DD MMM YYYY, HH:mm');
                                }
                                return '';
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });

                $('#filterStatus').on('change', function() {
                    $('#myTable').DataTable().ajax.reload();
                });
            })
        </script>
    </div>
</x-guest-layout>
