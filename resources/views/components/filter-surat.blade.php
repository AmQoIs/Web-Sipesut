<div class="relative z-40 w-max" role="dialog" aria-modal="true" x-show="isOpen"
    x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 translate-x-0"
    x-transition:enter-end="opacity-100 translate-x-full" x-transition:leave="transition ease-in duration-75 transform"
    x-transition:leave-start="opacity-100 translate-x-full" x-transition:leave-end="opacity-0 translate-x-0"
    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
    <div class="fixed inset-0 bg-black bg-opacity-25" @click="isOpen = !isOpen"></div>

    <div class="fixed inset-0 z-40 flex">
        <div
            class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
            <div class="flex items-center justify-between px-4">
                <h2 class="text-lg font-medium text-gray-900">Filter</h2>
                <button type="button" @click="isOpen = !isOpen"
                    class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Filters -->
            <form class="mt-4 border-t border-gray-200 w-full">
                <div class="px-8 py-4">
                    <h3 class="text-lg mb-3">Tanggal Pembuatan</h3>
                    <div class="flex flex-col items-center">
                        <div class="relative w-full">
                            <input name="start" id="start" type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4"
                                placeholder="Select date start">
                            <div class="absolute right-4 inset-y-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                        </div>
                        <span class="mx-4 text-gray-500">Sampai</span>
                        <div class="relative w-full">
                            <input name="end" type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4"
                                placeholder="Select date end">
                            <div class="absolute right-4 inset-y-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="border-t border-gray-200 px-8 py-6">
                    <h3 class="-mx-2 -my-3 flow-root text-lg">
                        <!-- Expand/collapse section button -->
                        Tipe Surat
                    </h3>
                    <!-- Filter section, show/hide based on section state. -->
                    <div class="pt-6" id="filter-section-mobile-0">
                        <div class="space-y-6">
                            <div class="flex items-center">
                                <input id="filter-mobile-color-0" name="color[]" value="white" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary>
                                <label for="filter-mobile-color-0"
                                    class="ml-3 min-w-0 flex-1 text-gray-500">&emsp;Nota Dinas</label>
                            </div>
                            <div class="flex items-center">
                                <input id="filter-mobile-color-1" name="color[]" value="beige" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary>
                                <label for="filter-mobile-color-1"
                                    class="ml-3 min-w-0 flex-1 text-gray-500">&emsp;Suart Edaran</label>
                            </div>
                            <div class="flex items-center">
                                <input id="filter-mobile-color-2" name="color[]" value="blue" type="checkbox" checked
                                    class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary>
                                <label for="filter-mobile-color-2"
                                    class="ml-3 min-w-0 flex-1 text-gray-500">&emsp;Surat Perintah</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
