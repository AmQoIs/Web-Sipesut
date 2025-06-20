<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="mytheme">

<head>
  @include('includes.head') 
</head>

<body class="min-h-screen font-sans text-gray-900 antialiased bg-white">
    
    @include('includes.header-guest')

    <div class="w-full flex flex-col sm:justify-center bg-white">
        {{ $slot }}
    </div>

    {{-- <script defer src="{{ asset('build/bundle.js') }}"></script></body> --}}
</body>

</html>
