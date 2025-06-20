<div class="hidden md:flex items-center gap-2 md:gap-4">
    @if (!request()->is('/surat'))
        <div class="relative">
            <a href="/surat" class="btn btn-primary w-max text-white">
                Surat Saya
            </a>
        </div>
    @endif
    @if (!request()->is('/'))
        <div class="relative">
            <a href="/" class="text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                    <path fill="currentColor" d="m12 3l8 6v12h-5v-7H9v7H4V9z" />
                </svg>
            </a>
        </div>
    @endif

    <div class="relative">
        <a href="/notifikasi" class="text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M21 19v1H3v-1l2-2v-6c0-3.1 2.03-5.83 5-6.71V4a2 2 0 0 1 2-2a2 2 0 0 1 2 2v.29c2.97.88 5 3.61 5 6.71v6zm-7 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2" />
            </svg>
        </a>

        <div class="absolute z-10 w-2 h-2 bg-error rounded-full top-0 right-0"></div>
    </div>

    <div class="relative inline-block text-left" x-data="{ isDropdownOpen: false }">
        <div class="flex items-center">
            <button type="button"
                class="inline-flex w-full justify-center items-center gap-x-2 rounded-md bg-inherit lg:text-lg font-semibold text-gray-500"
                id="profile-button" aria-expanded="true" aria-haspopup="true" @click="isDropdownOpen = !isDropdownOpen">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M12 19.2c-2.5 0-4.71-1.28-6-3.2c.03-2 4-3.1 6-3.1s5.97 1.1 6 3.1a7.23 7.23 0 0 1-6 3.2M12 5a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-3A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10c0-5.53-4.5-10-10-10" />
                </svg>
            </button>
        </div>

        <div class="absolute right-0 z-10 mt-2 w-max origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" x-show="isDropdownOpen"
            x-transition:enter="transition ease-out duration-100 transform"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75 transform"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
            <div class="py-1 lang" role="none">
                <p class="text-lg font-bold text-black px-4">{{ auth()->user()->nama }}</p>
                <p class="text-slate-600 px-4 mb-2">{{ auth()->user()->email }}</p>
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                @if (auth()->user()->role != App\Constants\Roles::ANGGOTA)
                    <a href="/profile" class="text-gray-700 px-4 py-2 text-lg flex gap-2 hover:bg-slate-200" role="menuitem"
                    tabindex="-1" id="menu-item-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 2A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2M7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.5.88 4.93 1.78A7.9 7.9 0 0 1 12 20c-1.86 0-3.57-.64-4.93-1.72m11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33A7.93 7.93 0 0 1 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.5-1.64 4.83M12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6m0 5a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 12 8a1.5 1.5 0 0 1 1.5 1.5A1.5 1.5 0 0 1 12 11" />
                        </svg>Profil
                    </a>
                @endif
                <a href="#" class="text-gray-700 px-4 py-2 text-lg flex gap-2 hover:bg-slate-200" role="menuitem"
                    tabindex="-1" id="menu-item-0">
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="button" @click="logout()" class="text-error flex gap-2" type="submit"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5M4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z" />
                            </svg>Logout</button>
                    </form>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function logout() {
        Swal.fire({
            title: "Anda yakin untuk keluar?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, saya yakin!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('logout');
                const formData = new FormData(form);

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json',
                        },
                        body: formData,
                    })
                    .then(response => {
                        console.log(response);
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                        if (data.success) {
                            window.location.href = "/";
                        } else {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Silakan coba lagi",
                                icon: "error"
                            });
                        }
                    })
                    .catch(error => {
                        console.error(error);
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
