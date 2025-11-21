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
                
                <p id="dynamic-title" class="fw-bold text-uppercase fs-5 mb-0 d-none d-md-block"></p>
                
                <!-- Filter Tahun -->
                <div class="dropdown">
                    <button class="btn btn-outline-danger btn-sm dropdown-toggle d-flex align-items-center gap-1" type="button" id="yearFilter" data-bs-toggle="dropdown" aria-expanded="false">
                        <iconify-icon icon="heroicons:calendar"></iconify-icon>
                        <span id="selected-year">Memuat...</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="yearFilter" id="yearDropdownMenu">
                        <!-- Options akan diisi secara dinamis oleh JavaScript -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex flex-wrap align-items-center gap-3">
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

            const dayNames = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ];

            const dayName = dayNames[now.getDay()];
            const day = now.getDate();
            const monthName = monthNames[now.getMonth()];
            const year = now.getFullYear();

            document.getElementById('live-date').innerText = `${dayName}, ${day} ${monthName} ${year}`;
        }

        // Ambil tahun dinamis dari API
        async function loadYearFilter() {
            try {
                const response = await fetch("/api/komposisi-sumber-pendapatan", {
                    method: "GET",
                    headers: {
                        "Accept": "application/json"
                    }
                });
                const result = await response.json();
                
                if (result.status === 200 && Array.isArray(result.data)) {
                    // Extract tahun yang unik dan urutkan descending (terbaru dulu)
                    const availableYears = [...new Set(result.data.map(d => d.tahun))]
                        .sort((a, b) => b - a);
                    
                    // Ambil tahun terbaru
                    const latestYear = availableYears[0];
                    
                    // Set tahun terbaru di localStorage jika belum ada
                    if (!localStorage.getItem('selectedYear')) {
                        localStorage.setItem('selectedYear', latestYear);
                    }
                    
                    const selectedYear = localStorage.getItem('selectedYear');
                    
                    // Update display tahun
                    document.getElementById('selected-year').innerText = selectedYear;
                    
                    // Populate dropdown menu
                    const dropdownMenu = document.getElementById('yearDropdownMenu');
                    dropdownMenu.innerHTML = '';
                    
                    availableYears.forEach(year => {
                        const li = document.createElement('li');
                        const a = document.createElement('a');
                        a.className = 'dropdown-item';
                        a.href = '#';
                        a.setAttribute('data-year', year);
                        a.textContent = year;
                        
                        // Mark active year
                        if (year == selectedYear) {
                            a.classList.add('active');
                        }
                        
                        // Event listener untuk year selection
                        a.addEventListener('click', function(e) {
                            e.preventDefault();
                            const chosenYear = this.getAttribute('data-year');
                            localStorage.setItem('selectedYear', chosenYear);
                            document.getElementById('selected-year').innerText = chosenYear;
                            
                            // Update active class
                            document.querySelectorAll('#yearDropdownMenu .dropdown-item').forEach(item => {
                                item.classList.remove('active');
                            });
                            this.classList.add('active');
                            
                            // Trigger refresh charts jika function tersedia
                            if (typeof window.refreshCharts === 'function') {
                                window.refreshCharts(chosenYear);
                            }
                        });
                        
                        li.appendChild(a);
                        dropdownMenu.appendChild(li);
                    });
                }
            } catch (err) {
                console.error('Error loading year filter:', err);
                document.getElementById('selected-year').innerText = new Date().getFullYear();;
            }
        }

        updateDate();
        setInterval(updateTime);
        loadYearFilter();
    </script>
@endpush
