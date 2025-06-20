@php
$classes = "block mb-2 text-sm font-medium text-blackGray"
@endphp


<div>
    
    <label for="komentar"  {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</label>
    <textarea id="komentar" name="komentar"  rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="{{ $placeholder }}"></textarea>

</div>