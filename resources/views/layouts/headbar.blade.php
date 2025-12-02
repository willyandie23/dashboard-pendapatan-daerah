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

                <!-- Dynamic Title - Hanya muncul di md ke atas -->
                <p id="dynamic-title" class="fw-bold text-uppercase fs-5 mb-0 d-none d-md-block"></p>

                <!-- Filter Tahun -->
                <div class="dropdown">
                    <button class="btn btn-outline-danger btn-sm dropdown-toggle d-flex align-items-center gap-1" 
                            type="button" id="yearFilter" data-bs-toggle="dropdown" aria-expanded="false">
                        <iconify-icon icon="heroicons:calendar"></iconify-icon>
                        <span id="selected-year">Memuat...</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="yearFilter" id="yearDropdownMenu">
                        <!-- Diisi oleh JS -->
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-auto">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <!-- Live Date & Time - SAMA seperti dynamic-title: HIDDEN di mobile -->
                <div class="date-time-block text-end d-none d-md-block">
                    <div class="date fw-medium" id="live-date"></div>
                    <div class="time fw-bold" id="live-time"></div>
                </div>

                <!-- Theme Toggle -->
                <button type="button" data-theme-toggle
                    class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center">
                    <iconify-icon icon="heroicons:moon" class="icon dark-icon"></iconify-icon>
                    <iconify-icon icon="heroicons:sun" class="icon light-icon"></iconify-icon>
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Update Date & Time (sekali per detik, lebih efisien)
    function updateDateTime() {
        const now = new Date();

        // Format Waktu: 14:25:09
        const timeStr = now.toLocaleTimeString('id-ID', { 
            hour: '2-digit', 
            minute: '2-digit', 
            second: '2-digit' 
        });
        document.getElementById('live-time').textContent = timeStr;

        // Format Tanggal: Senin, 10 Maret 2025
        const dateOptions = { 
            weekday: 'long', 
            day: 'numeric', 
            month: 'long', 
            year: 'numeric' 
        };
        const dateStr = now.toLocaleDateString('id-ID', dateOptions);
        document.getElementById('live-date').textContent = dateStr.charAt(0).toUpperCase() + dateStr.slice(1);
    }

    // Load tahun dari API & setup dropdown
    async function loadYearFilter() {
        try {
            const response = await fetch("/api/komposisi-sumber-pendapatan", {
                headers: { "Accept": "application/json" }
            });

            if (!response.ok) throw new Error("Gagal mengambil data");

            const result = await response.json();

            if (result.status !== 200 || !Array.isArray(result.data)) {
                throw new Error("Format data tidak valid");
            }

            const years = [...new Set(result.data.map(item => item.tahun))]
                .sort((a, b) => b - a);

            const latestYear = years[0];
            const savedYear = localStorage.getItem('selectedYear');

            if (!savedYear && latestYear) {
                localStorage.setItem('selectedYear', latestYear);
            }

            const selectedYear = savedYear || latestYear || new Date().getFullYear();
            localStorage.setItem('selectedYear', selectedYear);

            // Update tampilan
            document.getElementById('selected-year').textContent = selectedYear;

            // Isi dropdown
            const menu = document.getElementById('yearDropdownMenu');
            menu.innerHTML = '';

            years.forEach(year => {
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.className = 'dropdown-item';
                a.href = '#';
                a.textContent = year;
                a.dataset.year = year;

                if (year == selectedYear) a.classList.add('active');

                a.addEventListener('click', function(e) {
                    e.preventDefault();
                    const chosen = this.dataset.year;
                    localStorage.setItem('selectedYear', chosen);
                    document.getElementById('selected-year').textContent = chosen;

                    menu.querySelectorAll('.dropdown-item').forEach(item => 
                        item.classList.remove('active')
                    );
                    this.classList.add('active');

                    if (typeof window.refreshCharts === 'function') {
                        window.refreshCharts(chosen);
                    }
                });

                li.appendChild(a);
                menu.appendChild(li);
            });

        } catch (err) {
            console.error('Error loading year filter:', err);
            const currentYear = new Date().getFullYear();
            document.getElementById('selected-year').textContent = currentYear;
            localStorage.setItem('selectedYear', currentYear);
        }
    }

    // Jalankan saat halaman loaded
    document.addEventListener('DOMContentLoaded', function() {
        updateDateTime();        // Pertama kali langsung update
        setInterval(updateDateTime, 1000);  // Lalu tiap detik
        loadYearFilter();
    });
</script>
@endpush