<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        SIPESUT | Admin
    </title>
    <link rel="icon" href="{{ asset('/image/logo.png') }}">
    <link href="{{ asset('admin/build/style.css') }}" rel="stylesheet" />
    @vite(['resources/css/app.css'])

</head>

<body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
    <!-- ===== Preloader Start ===== -->
    <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })"
        class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent">
        </div>
    </div>

    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
        <!-- ===== Sidebar Start ===== -->
        <aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
            class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-[#5383e9] duration-300 ease-linear lg:static lg:translate-x-0"
            @click.outside="sidebarToggle = false">
            <!-- SIDEBAR HEADER -->
            <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
                <a href="{{ route('admin') }}" class="flex items-center text-white text-2xl font-bold space-x-5">
                    <x-application-logo />
                    <p>SIPESUT</p>
                </a>

                <button class="block lg:hidden bg-white text-primary rounded-lg p-2"
                    @click.stop="sidebarToggle = !sidebarToggle">
                    <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">git
                        <path
                            d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                            fill="" />
                    </svg>
                </button>
            </div>
            <!-- SIDEBAR HEADER -->

            <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
                <!-- Sidebar Menu -->
                @include('includes.sidebar-admin')

                <!-- ===== Sidebar End ===== -->

                <!-- ===== Content Area Start ===== -->
                <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                    @include('includes.header-admin')
                    <!-- ===== Main Content Start ===== -->
                    <main>
                        @yield('content')
                    </main>
                    <!-- ===== Main Content End ===== -->
                </div>
                <!-- ===== Content Area End ===== -->
            </div>
            <!-- ===== Page Wrapper End ===== -->
            <script defer src="{{ asset('admin/build/bundle.js') }}"></script>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function fetchNotifications() {
        fetch('{{ route('notifications.admin.fetch') }}')
            .then(response => response.json())
            .then(data => {
                data = JSON.parse(data);
                const notificationsDropdown = document.querySelector('.dropdown-notifications ul');
                notificationsDropdown.innerHTML = '';


                if (data.length == 0) {
                    const listItem = document.createElement('li');
                    listItem.innerHTML = `
                      <a href="#" class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3">
                          <p class="text-success bg-success bg-opacity-10 rounded-0 inline-flex rounded-full w-fit px-2">Belum ada notifikasi baru</p>                    
                      </a>
                  `;
                    notificationsDropdown.appendChild(listItem);
                }

                data.forEach(notification => {
                    const listItem = document.createElement('li');
                    const isDilihat = notification.status_dilihat === 0 ?
                        'bg-gray-200 hover:bg-white text-secondary' :
                        'text-black bg-white hover:bg-gray-200';
                    listItem.innerHTML = `
                        <a href="/admin/surat/${notification.surat_id}" class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 ${isDilihat}">
                            <p class="text-sm font-bold">
                                <span class="">${notification.pesan}</span>
                            </p>
                            <p class="text-xs text-black">${new Date(notification.created_at).toLocaleString('id-ID')}</p>                            
                        </a>
                    `;
                    notificationsDropdown.appendChild(listItem);
                });
            })
            .catch(error => {
                console.error('Error fetching notifications:', error);
            });
    }

    window.onload = function() {
        fetchNotifications();
    };
</script>

</html>
