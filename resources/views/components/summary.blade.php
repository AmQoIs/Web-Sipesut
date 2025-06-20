@props(['total' => 20, 'dinas' => 5, 'edaran' => 5, 'perintah' => 5])

@php
    $labels = ['Total', 'Nota Dinas', 'Surat Perintah', 'Surat Edaran'];
@endphp

<h3 class="text-3xl text-center my-4 font-bold">Ringkasan Total Surat</h3>
<div class="flex justify-center md:px-[10%]">
    <table class="table max-w-xl">
        <tr class="border-none">

            @foreach ($labels as $label)
                <th class="text-sm text-center">{{ $label }}</th>
            @endforeach
        </tr>
        <tr>
            <th class="text-lg font-bold text-center bg-primary text-white rounded-3xl">{{ $total }}</th>
            <th class="text-lg font-bold text-center text-primary">{{ $dinas }}</th>
            <th class="text-lg font-bold text-center text-primary">{{ $perintah }}</th>
            <th class="text-lg font-bold text-center text-primary">{{ $edaran }}</th>
        </tr>

    </table>


</div>
