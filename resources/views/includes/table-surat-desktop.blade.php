<div class="hidden md:block container mx-auto py-8">
    <table id="myTable" class="table table-zebra py-5 static">
        <thead class="bg-primary text-white rounded-lg">
            <tr>
                <th>No Surat</th>
                <th>Tipe Surat</th>
                <th>Judul</th>
                <th>Perihal</th>
                <th>Kepada</th>
                <th>Status</th>
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
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },

            ]
        })
    })
</script>