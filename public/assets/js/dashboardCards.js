// Fungsi untuk format Rupiah
function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(angka);
}

// Fungsi untuk render cards
function renderDashboardCards(year = null) {
    // Jika year tidak diberikan, gunakan tahun dari localStorage
    if (year === null || year === undefined) {
        year = localStorage.getItem('selectedYear') || currentYear;
    }
    
    fetch("/api/komposisi-target-selisih-pendapatan", {
        method: "GET",
        headers: {
            "Accept": "application/json"
        }
    })
    .then(response => response.json())
    .then(result => {
        if (result.status === 200 && Array.isArray(result.data)) {
            // Filter data berdasarkan tahun
            const filteredData = result.data.find(d => d.tahun == year);
            
            if (filteredData) {
                // Update Target
                document.querySelector('.card-target .custom-body p').textContent = 
                    formatRupiah(filteredData.target);
                
                // Update Realisasi
                document.querySelector('.card-realisasi .custom-body p').textContent = 
                    formatRupiah(filteredData.realisasi);
                
                // Update Persentase
                document.querySelector('.card-persentase .custom-body p').textContent = 
                    filteredData.persentase.toFixed(2) + '%';
                
                // Update Selisih
                document.querySelector('.card-selisih .custom-body p').textContent = 
                    formatRupiah(filteredData.selisih);
            } else {
                console.warn('Data tidak ditemukan untuk tahun:', year);

                document.querySelector('.card-target .custom-body p').textContent = 
                    '-';
                
                // Update Realisasi
                document.querySelector('.card-realisasi .custom-body p').textContent = 
                    '-';
                
                // Update Persentase
                document.querySelector('.card-persentase .custom-body p').textContent = 
                    '-';
                
                // Update Selisih
                document.querySelector('.card-selisih .custom-body p').textContent = 
                    '-';
            }
        }
    })
    .catch(err => {
        console.error('Error fetching dashboard cards:', err);
    });
}

// Panggil saat page load
renderDashboardCards();
// document.addEventListener('DOMContentLoaded', function() {
// });
