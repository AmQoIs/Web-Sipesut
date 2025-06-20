<x-guest-layout>
    <div class="px-8 mt-32 mb-12">
        <!--Title-->
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold">Detail <br class="md:hidden"> Surat</h1>

            <div>
                <a href="/surat/" class="btn btn-primary btn-outline"> <svg xmlns="http://www.w3.org/2000/svg"
                        width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M9.5 3A6.5 6.5 0 0 1 16 9.5c0 1.61-.59 3.09-1.56 4.23l.27.27h.79l5 5l-1.5 1.5l-5-5v-.79l-.27-.27A6.52 6.52 0 0 1 9.5 16A6.5 6.5 0 0 1 3 9.5A6.5 6.5 0 0 1 9.5 3m0 2C7 5 5 7 5 9.5S7 14 9.5 14S14 12 14 9.5S12 5 9.5 5" />
                    </svg> <span class="hidden md:inline">Cari Surat</span></a>
                <a href="/surat/upload" class="btn btn-primary text-white mt-2"> <svg xmlns="http://www.w3.org/2000/svg"
                        width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m2 21l21-9L2 3v7l15 2l-15 2z" />
                    </svg> <span class="hidden md:inline">Kirim Surat Baru</span></a>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row justify-center gap-4 mt-4">
            <!-- Detail Card -->
            <div class="bg-white rounded shadow h-min w-full">
                <div class="bg-primary text-white p-4 rounded-t">
                    <h2 class="text-xl font-semibold">Detail Lengkap Surat</h2>
                </div>
                <div class="p-6">

                    <div class="flex items-center mb-4 border-b pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path fill="currentColor"
                                d="M12 2A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2M7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.5.88 4.93 1.78A7.9 7.9 0 0 1 12 20c-1.86 0-3.57-.64-4.93-1.72m11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33A7.93 7.93 0 0 1 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.5-1.64 4.83M12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6m0 5a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 12 8a1.5 1.5 0 0 1 1.5 1.5A1.5 1.5 0 0 1 12 11" />
                        </svg>


                        <div class="ml-2">
                            <p class="block text-gray-400 mb-0">Dibuat oleh <span class="block text-black font-bold">
                                    {{ $surat->user->email }}</span></p>

                        </div>


                    </div>

                    <div class="flex justify-between mb-4 border-b pb-2">
                        <div class="flex items-center ">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M2.106 6.447A2 2 0 0 0 1 8.237V16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.236a2 2 0 0 0-1.106-1.789l-7-3.5a2 2 0 0 0-1.788 0l-7 3.5Zm1.48 4.007a.75.75 0 0 0-.671 1.342l5.855 2.928a2.75 2.75 0 0 0 2.46 0l5.852-2.927a.75.75 0 1 0-.67-1.341l-5.853 2.926a1.25 1.25 0 0 1-1.118 0l-5.856-2.928Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <div class="ml-2">
                                <p class="block text-gray-400 mb-0">No Surat <span class="block text-black font-bold">
                                        {{ $surat->no_surat }}</span></p>

                            </div>
                        </div>

                        <div class="flex items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5">
                                <path
                                    d="M4.75 3A1.75 1.75 0 0 0 3 4.75v2.752l.104-.002h13.792c.035 0 .07 0 .104.002V6.75A1.75 1.75 0 0 0 15.25 5h-3.836a.25.25 0 0 1-.177-.073L9.823 3.513A1.75 1.75 0 0 0 8.586 3H4.75ZM3.104 9a1.75 1.75 0 0 0-1.673 2.265l1.385 4.5A1.75 1.75 0 0 0 4.488 17h11.023a1.75 1.75 0 0 0 1.673-1.235l1.384-4.5A1.75 1.75 0 0 0 16.896 9H3.104Z" />
                            </svg>

                            <div class="ml-2">
                                <p class="block text-gray-400 mb-0">Tipe Surat
                                    @if ($surat->tipe_surat == 'SURAT_BIASA')
                                        <span
                                            class="block mt-2 bg-primary text-primary rounded-full bg-opacity-10  px-3 py-1 text-sm font-medium">
                                            Surat Biasa</span>
                                    @elseif($surat->tipe_surat == 'SURAT_PERINTAH')
                                        <span
                                            class="block mt-2 bg-error text-error rounded-full bg-opacity-10  px-3 py-1 text-sm font-medium">
                                            Surat Perintah</span>
                                    @elseif($surat->tipe_surat == 'NOTA _DINAS')
                                        <span
                                            class="block mt-2 bg-secondary text-secondary rounded-full bg-opacity-10  px-3 py-1 text-sm font-medium">
                                            Nota Dinas</span>
                                    @elseif($surat->tipe_surat == 'SURAT_EDARAN')
                                        <span
                                            class="block mt-2 bg-success text-success rounded-full bg-opacity-10  px-3 py-1 text-sm font-medium">
                                            Surat Edaran</span>
                                    @endif
                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="flex items-center mb-4 border-b pb-2">
                        <div class="flex items-center ">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902 1.168.188 2.352.327 3.55.414.28.02.521.18.642.413l1.713 3.293a.75.75 0 0 0 1.33 0l1.713-3.293a.783.783 0 0 1 .642-.413 41.102 41.102 0 0 0 3.55-.414c1.437-.231 2.43-1.49 2.43-2.902V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0 0 10 2ZM6.75 6a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Zm0 2.5a.75.75 0 0 0 0 1.5h3.5a.75.75 0 0 0 0-1.5h-3.5Z"
                                    clip-rule="evenodd" />
                            </svg>


                            <div class="ml-2">
                                <p class="block text-gray-400 mb-0">Judul Surat <span
                                        class="block text-black font-bold">
                                        {{ $surat->judul }}</span></p>

                            </div>
                        </div>


                    </div>
                    <div class="flex items-center justify-between mb-4 border-b pb-2">
                        <div class="flex items-center max-w-[140px]">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5">
                                <path
                                    d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                            </svg>

                            <div class="ml-2">
                                <p class="block text-gray-400 mb-0">Diajukan oleh <span
                                        class="block text-black font-bold">
                                        {{ $surat->dari }}</span></p>

                            </div>
                        </div>
                    </div>
                    <div class="flex items-center mb-4 border-b pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path
                                d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                            <path
                                d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                        </svg>

                        <div class="ml-2">
                            <p class="block text-gray-400 mb-0">Perihal <span class="block text-black font-bold">
                                    {{ $surat->perihal }}</span></p>

                        </div>
                    </div>
                    <div class="flex items-center mb-4 border-b pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path
                                d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z" />
                        </svg>

                        <div class="ml-2">
                            <p class="block text-gray-400 mb-0">Ditujukan Kepada <span
                                    class="block text-black font-bold">
                                    {{ $surat->kepada }}</span></p>

                        </div>
                    </div>

                    <div class="flex items-center mb-4 border-b pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                          </svg>



                        <div class="ml-2">
                            <p class="block text-gray-400 mb-0">Diupload Pada <span class="block text-black font-bold">
                                    {{ $surat->created_at->locale('id')->isoFormat('dddd, DD MMM YYYY, HH:mm'); }}</span></p>
                        </div>

                    </div>

                    @if ($surat->accepted_at)
                        <div class="flex items-center mb-4 border-b pb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                              </svg>


                            <div class="ml-2">
                                <p class="block text-gray-400 mb-0">Diterima Pada <span class="block text-black font-bold">
                                        {{ $surat->accepted_at->locale('id')->isoFormat('dddd, DD MMM YYYY, HH:mm'); }}</span></p>
                            </div>

                        </div>
                    @endif


                    <div class="flex items-center justify-between">

                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M16.403 12.652a3 3 0 0 0 0-5.304 3 3 0 0 0-3.75-3.751 3 3 0 0 0-5.305 0 3 3 0 0 0-3.751 3.75 3 3 0 0 0 0 5.305 3 3 0 0 0 3.75 3.751 3 3 0 0 0 5.305 0 3 3 0 0 0 3.751-3.75Zm-2.546-4.46a.75.75 0 0 0-1.214-.883l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <div class="ml-2">
                                <p class="block text-gray-400">Status
                                    @if ($surat->status == 'BELUM_DICEK')
                                        <span
                                            class="block mt-2 bg-primary text-primary rounded-full bg-opacity-10  px-3 py-1 text-sm font-medium">
                                            Belum Dicek</span>
                                    @elseif($surat->status == 'DITOLAK')
                                        <span
                                            class="block mt-2 bg-error text-error rounded-full bg-opacity-10  px-3 py-1 text-sm font-medium">
                                            Ditolak</span>
                                    @elseif($surat->status == 'REVISI')
                                        <span
                                            class="block mt-2 bg-secondary text-secondary rounded-full bg-opacity-10  px-3 py-1 text-sm font-medium">
                                            Revisi</span>
                                        @if (!$surat->apakah_sudah_revisi)
                                            <span class="block uppercase text-red-500">Mohon Untuk Segera Revisi
                                                Surat</span>
                                        @endif
                                    @elseif($surat->status == 'DITERIMA')
                                        <span
                                            class="block mt-2 bg-success text-success rounded-full bg-opacity-10  px-3 py-1 text-sm font-medium">
                                            Diterima</span>
                                    @endif
                                </p>
                            </div>


                        </div>

                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5">
                                <path
                                    d="M3 3.5A1.5 1.5 0 0 1 4.5 2h6.879a1.5 1.5 0 0 1 1.06.44l4.122 4.12A1.5 1.5 0 0 1 17 7.622V16.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 3 16.5v-13Z" />
                            </svg>

                            <div class="ml-2">

                                <p class="block text-gray-400 mb-0">
                                    File
                                    <span class="flex">
                                        <a href="{{ route('anggota.surat.lihat', ['id' => $surat->id]) }}"
                                            class="mx-auto text-center px-4 py-2 rounded my-2 text-secondary bg-white transition-colors duration-300 border border-2 border-secondary hover:bg-secondary hover:text-white"
                                            target="_blank">Unduh Surat</a>
                                    </span>
                                </p>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Riwayat Card -->
            <div class="bg-white rounded shadow h-min w-full">
                <div class="bg-warning text-white p-4 rounded-t">
                    <h2 class="text-xl font-semibold">Riwayat Surat</h2>
                </div>
                <div class="p-6 flex items-center justify-center">
                    {{-- Riwayat Surat --}}
                    <x-timeline :riwayats="$riwayats">

                    </x-timeline>
                </div>
            </div>
        </div>


        <div class="flex justify-center gap-4 my-4">
            @if ($surat->status === 'REVISI' && !$surat->apakah_sudah_revisi)
                <a href="{{ route('anggota.surat.edit', ['id' => $surat->id]) }}"
                    class="btn btn-primary text-white">Revisi</a>
            @endif
            <button onclick="window.location.href = '/surat'" class="btn btn-primary btn-outline">Kembali</button>
        </div>
    </div>
</x-guest-layout>
