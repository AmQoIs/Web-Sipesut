<nav class="bg-white text-white p-5 md:px-[5%] fixed z-40 w-full top-0 border-b border-slate-400" x-data="{ isNavShow: false }">
    <div class="container mx-auto flex justify-between items-center max-w-7xl relative">

        @if (request()->is('login*'))
            <div class="flex space-x-4">
                <div class="absolute right-0 top-3">
                    <a href="/">
                        <img src="/image/home-icon.png" width="40" alt="Home Icon">
                    </a>
                </div>
            </div>
        @else
            <a class="flex items-center space-x-4 text-sm md:text-md" href="/">
                <x-application-logo />
                <span class="text-black">Sistem Informasi Pengelolaan Surat
                    <span class="md:block">Inspektorat Jenderal TNI</span>
                </span>
            </a>

            @auth
                @include('includes.desktop-guest-nav')
                @include('includes.mobile-guest-nav')
            @else
                <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    Login
                </x-nav-link>

            @endauth
        @endif

    </div>
</nav>
