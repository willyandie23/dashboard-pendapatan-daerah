// Variabel global untuk menyimpan tahun yang tersedia
let availableYears = [];
let currentYear = null;

// Fungsi untuk mendapatkan list tahun yang tersedia dari API
async function getAvailableYears() {
    try {
        const response = await fetch("/api/komposisi-sumber-pendapatan", {
            method: "GET",
            headers: {
                "Accept": "application/json"
            }
        });
        const result = await response.json();
        
        if (result.status === 200 && Array.isArray(result.data)) {
            // Ekstrak tahun yang unik dan urutkan descending (terbaru dulu)
            availableYears = [...new Set(result.data.map(d => d.tahun))]
                .sort((a, b) => b - a);
            
            // Set tahun terbaru sebagai default jika belum ada di localStorage
            if (!localStorage.getItem('selectedYear') && availableYears.length > 0) {
                currentYear = availableYears[0]; // Tahun terbaru
                localStorage.setItem('selectedYear', currentYear);
            } else {
                currentYear = localStorage.getItem('selectedYear') || availableYears[0];
            }

            availableYears.push('2024');
            
            return availableYears;
        }
    } catch (err) {
        console.error('Error fetching years:', err);
    }
    
    return [];
}

// Fungsi untuk populate dropdown dengan tahun yang tersedia
async function populateYearDropdown() {
    const years = await getAvailableYears();
    const dropdownMenu = document.getElementById('yearDropdownMenu');
    const selectedYearSpan = document.getElementById('selected-year');
    
    if (dropdownMenu && years.length > 0) {
        dropdownMenu.innerHTML = '';
        
        years.forEach(year => {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.className = 'dropdown-item year-option';
            a.href = '#';
            a.setAttribute('data-year', year);
            a.textContent = year;
            
            // Mark active year
            if (year == currentYear) {
                a.classList.add('active');
            }
            
            li.appendChild(a);
            dropdownMenu.appendChild(li);
        });
        
        // Update display dengan tahun yang dipilih
        selectedYearSpan.innerText = currentYear;
        
        // Re-attach event listeners
        attachYearFilterListeners();
    }
}

// Fungsi untuk attach event listeners ke year options
function attachYearFilterListeners() {
    document.querySelectorAll('.year-option').forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();
            const selectedYear = this.getAttribute('data-year');
            currentYear = selectedYear;
            localStorage.setItem('selectedYear', selectedYear);
            document.getElementById('selected-year').innerText = selectedYear;
            
            // Update active class
            document.querySelectorAll('.year-option').forEach(opt => {
                opt.classList.remove('active');
            });
            this.classList.add('active');
            
            // Trigger refresh data dengan tahun baru
            window.refreshCharts(selectedYear);
        });
    });
}

// Panggil saat page load
document.addEventListener('DOMContentLoaded', function() {
    populateYearDropdown();
});
