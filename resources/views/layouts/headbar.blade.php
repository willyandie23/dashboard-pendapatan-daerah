<div class="navbar-header">
    <div class="row align-items-center justify-content-between">
        <div class="col-auto">
            <div class="d-flex flex-wrap align-items-center gap-4">
                <button type="button" class="sidebar-toggle">
                    <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                    <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                </button>
                <button type="button" class="sidebar-mobile-toggle">
                    <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                </button>
                <!-- Sembunyikan di mobile dengan d-none d-md-block -->
                <p id="dynamic-title" class="fw-bold text-uppercase fs-5 mb-0 d-none d-md-block"></p>
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <!-- Sembunyikan date-time di mobile kecil -->
                <div class="date-time-block align-items-left text-end">
                    <div class="date" id="live-date"></div>
                    <div class="time" id="live-time"></div>
                </div>
                <button type="button" data-theme-toggle
                    class="w-40-px h-40-px bg-neutral-200 
                        rounded-circle d-flex 
                        justify-content-center 
                        align-items-center">
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            document.getElementById('live-time').innerText = `${hours}:${minutes}:${seconds}`;
        }

        function updateDate() {
            const now = new Date();

            // Menyusun tanggal dengan format: Kamis, 11 September 2025
            const dayNames = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ];

            const dayName = dayNames[now.getDay()];
            const day = now.getDate();
            const monthName = monthNames[now.getMonth()];
            const year = now.getFullYear();

            // Menampilkan tanggal dalam format yang sesuai
            document.getElementById('live-date').innerText = `${dayName}, ${day} ${monthName} ${year}`;
        }

        // Panggil fungsi updateDate setiap pagi untuk memperbarui tanggal
        updateDate();

        // Update waktu setiap detik
        setInterval(updateTime);
    </script>
@endpush
