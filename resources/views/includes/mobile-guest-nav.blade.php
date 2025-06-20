<button @click="isNavShow = !isNavShow" class="md:hidden">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="text-dark">
        <path d="M3 18h18v-2H3zm0-5h18v-2H3zm0-7v2h18V6z"></path>
    </svg>
</button>

<div class="md:hidden fixed z-40 top-0" role="dialog" aria-modal="true" x-show="isNavShow">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0 z-40"></div>
    <div
        class="fixed inset-y-0 right-0 z-40 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
            <a class="flex items-center space-x-4 text-sm md:text-md w-4/6 md:w-full" href="/">
                <x-application-logo />
                <span class="text-black">Sistem Informasi Pengelolaan Surat
                    <span class="md:block">Inspektorat Jenderal TNI</span>
                </span>
            </a>
            <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="isNavShow = !isNavShow">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="mt-6 flow-root px-4 bg-white">
            <div class="-my-6 divide-y divide-gray-500/10">
                <div class="space-y-2 py-6" @click="isNavShow = !isNavShow">
                    <p class="text-lg font-bold text-black px-2">{{ auth()->user()->nama }}</p>
                    <p class="text-slate-600 px-2 pb-2 border-b border-slate-300">{{ auth()->user()->email }}</p>
                    @if (!request()->is('/'))
                        <a href="/"
                            class="-mx-3 nav-link flex gap-2 px-3 py-2 text-base font-semibold leading-7 rounded-lg text-gray-500 hover:bg-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m12 3l8 6v12h-5v-7H9v7H4V9z" />
                            </svg>Beranda
                        </a>
                    @endif
                    <a href="/surat"
                        class="-mx-3 nav-link flex gap-2 px-3 py-2 text-base font-semibold leading-7 rounded-lg text-gray-500 hover:bg-slate-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="m20 8l-8 5l-8-5V6l8 5l8-5m0-2H4c-1.11 0-2 .89-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2" />
                        </svg>Surat
                    </a>
                    @if (auth()->user()->role != App\Constants\Roles::ANGGOTA)
                        <a href="/profile"
                            class="-mx-3 nav-link flex gap-2 px-3 py-2 text-base font-semibold leading-7 rounded-lg text-gray-500 hover:bg-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 2A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2M7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.5.88 4.93 1.78A7.9 7.9 0 0 1 12 20c-1.86 0-3.57-.64-4.93-1.72m11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33A7.93 7.93 0 0 1 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.5-1.64 4.83M12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6m0 5a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 12 8a1.5 1.5 0 0 1 1.5 1.5A1.5 1.5 0 0 1 12 11" />
                            </svg>Profil
                        </a>
                    @endif

                    <a href="/notifikasi"
                        class="-mx-3 nav-link flex gap-2 px-3 py-2 text-base font-semibold leading-7 rounded-lg text-gray-500 hover:bg-slate-300 items-center relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M21 19v1H3v-1l2-2v-6c0-3.1 2.03-5.83 5-6.71V4a2 2 0 0 1 2-2a2 2 0 0 1 2 2v.29c2.97.88 5 3.61 5 6.71v6zm-7 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2" />
                        </svg>Notifikasi
                        <div class="absolute z-10 w-2 h-2 bg-error rounded-full right-0"></div>
                    </a>
                    <a href="/"
                        class="-mx-3 nav-link flex gap-2 px-3 py-2 text-base font-semibold leading-7 rounded-lg hover:bg-slate-300">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="text-error flex gap-2" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5M4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z" />
                                </svg>Logout</button>
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
