<div x-data="{ activeTab: 'detailSurat' }">
    <!-- Menu -->
    <div class="border-b border-gray-200">
        <nav class="-mb-px flex space-x-5" aria-label="Tabs">
            <button @click="activeTab = 'detailSurat'" :class="{ 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'detailSurat', 'border-secondary text-secondary border-b-2': activeTab === 'detailSurat' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm focus:outline-none">
                Detail Surat
            <button @click="activeTab = 'riwayatSurat'" :class="{ 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'riwayatSurat', 'border-secondary text-secondary border-b-2': activeTab === 'riwayatSurat' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm focus:outline-none">
                Riwayat Surat
            </button>

            <button @click="activeTab = 'kelolaSurat'" :class="{ 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'kelolaSurat', 'border-secondary text-secondary border-b-2': activeTab === 'kelolaSurat' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm focus:outline-none">
                Kelola Surat
            </button>

        </nav>
    </div>

    {{-- Konten --}}
    <div x-show="activeTab === 'detailSurat'" class="w-1/2 py-6">
        <x-detail-surat-card :surat="$surat"></x-detail-surat-card>
        {{-- <x-ubah-status-surat-card :surat="$surat"></x-ubah-status-surat-card>/ --}}
    </div>
    <div x-show="activeTab === 'riwayatSurat'" class="py-6 w-1/2">

        <x-riwayat-surat-card :surat="$surat" :riwayats="$riwayats"></x-riwayat-surat-card>
    </div>

    <div x-show="activeTab === 'kelolaSurat'" class="py-6">

        <x-ubah-status-surat-card :surat="$surat"></x-ubah-status-surat-card>
    </div>
    <!-- Add more tab content sections as needed -->

</div>
