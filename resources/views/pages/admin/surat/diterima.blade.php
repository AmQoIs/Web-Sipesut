<!-- resources/views/surat/index.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    
        
        <table class="data-table py-5">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No Surat</th>
                    <th>Tipe Surat</th>
                    <th>Judul</th>
                    <th>Perihal</th>
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
        background-color: #d4d4d4;
    }

    select {
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e);
        background-position: right -.2rem center !important;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 1rem;
        -webkit-print-color-adjust: exact;
    }

    .detail-btn {
        background-color: #fff;
        border: 1px solid #5383e9;
        color: #5383e9;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .detail-btn:hover {
        background-color: #5383e9;
        color: #fff
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.surat.diterima') }}",
            columns: [
                {data: 'no_surat', name: 'no_surat'},
                {data: 'tipe_surat', name: 'tipe_surat'},
                {data: 'judul', name: 'judul'},
                {data: 'perihal', name: 'perihal'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
</script>
@endsection
