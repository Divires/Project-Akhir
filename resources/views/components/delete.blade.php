<div x-data="{ openModal: false }" class="inline-block">

    <button aria-label="Hapus" @click="openModal = true"
        class="text-[#ee1818] hover:text-[#b31313] duration-200 transition" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <path d="M14 11v6" />
            <path d="M10 11v6" />
            <path d="M6 7v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7" />
            <path d="M4 7h16" />
            <path d="M7 7l2-4h6l2 4" />
        </svg>
    </button>

    <div x-show="openModal" x-cloak class="fixed inset-0 z-40 bg-black/50"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="openModal = false">
    </div>

    <div x-show="openModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center px-4"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        @click.away="openModal = false">

        <div class="bg-white rounded-lg shadow-lg w-full max-w-sm text-center p-6">

            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 h-16 w-16 text-red-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01M12 19c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7z" />
            </svg>

            <h2 class="text-lg font-semibold text-gray-800 mb-6">Konfirmasi Hapus Data</h2>

            <div class="flex justify-center space-x-4">
                <button @click="openModal = false"
                    class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 border border-gray-300 rounded-lg">
                    Batal
                </button>

                <form method="POST">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>







<!--
<div class="fixed inset-0 bg-black/60 flex items-center justify-center z-50">

    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2">
                                        <path d="M14 11v6" />
                                        <path d="M10 11v6" />
                                        <path d="M6 7v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7" />
                                        <path d="M4 7h16" />
                                        <path d="M7 7l2-4h6l2 4" />
                                    </svg>
    <div class="bg-white rounded-xl p-6 w-full max-w-sm text-center shadow-lg">
        <div class="text-red-600 text-4xl mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="40" height="40" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>

        <h2 class="text-lg font-semibold text-[#2c2c2c]">Hapus Data</h2>

        <p class="text-[#7c7c7c] mt-2 mb-5">Anda yakin menghapus data ini?</p>

        <div class="flex justify-center gap-4">
            <button class="px-4 py-2 rounded border border-[#e2e2e2] text-[#2c2c2c] hover:bg-[#f1f1f1] transition">
                Cancel
            </button>
            <button onclick="showDeleteModal()" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 transition">
                Hapus
            </button>
        </div>
    </div>
</div>
-->
