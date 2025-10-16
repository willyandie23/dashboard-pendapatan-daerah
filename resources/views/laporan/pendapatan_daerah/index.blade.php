@extends('layouts.app')

@push('styles')
    <style>
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
            margin: 10px 0;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .chart-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .chart-controls {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-label {
            font-weight: 500;
            font-size: 14px;
            color: #333;
            white-space: nowrap;
        }

        .filter-group select {
            min-width: 180px;
        }

        .accordion-body {
            padding: 1.5rem 1rem;
        }

        .export-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .export-buttons .btn {
            padding: 6px 12px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .export-buttons .btn i {
            font-size: 16px;
        }

        /* Dark mode styling */
        [data-theme="dark"] .chart-title {
            color: #fff;
        }
        
        [data-theme="dark"] .accordion-button {
            color: #fff;
        }

        [data-theme="dark"] .filter-label {
            color: #fff;
        }

        /* Tablet (768px - 991px) */
        @media (max-width: 991px) {
            .chart-header {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }

            .chart-title {
                font-size: 16px;
            }

            .chart-controls {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .filter-group {
                width: 100%;
            }

            .filter-group select {
                flex: 1;
                min-width: unset;
            }

            .export-buttons {
                width: 100%;
                justify-content: stretch;
            }

            .export-buttons .btn {
                flex: 1;
                justify-content: center;
                min-width: 80px;
            }

            .accordion-body {
                padding: 1rem 0.75rem;
            }
        }

        /* Mobile (576px - 767px) */
        @media (max-width: 767px) {
            .container {
                padding-left: 12px;
                padding-right: 12px;
            }

            .card {
                margin-bottom: 1rem;
            }

            .card-body {
                padding: 1rem;
            }

            .chart-container {
                height: 250px;
                margin: 5px 0;
            }

            .chart-title {
                font-size: 15px;
                margin-bottom: 0;
            }

            .filter-label {
                font-size: 13px;
            }

            .filter-group select {
                font-size: 13px;
            }

            .export-buttons .btn {
                font-size: 12px;
                padding: 5px 10px;
            }

            .export-buttons .btn i {
                font-size: 14px;
            }

            .accordion-body {
                padding: 1rem 0.5rem;
            }

            /* Table responsive adjustments */
            .table {
                font-size: 13px;
            }

            .table thead th {
                font-size: 12px;
                padding: 8px 6px;
            }

            .table tbody td {
                padding: 8px 6px;
            }

            .ps-4 {
                padding-left: 1rem !important;
            }
        }

        /* Small Mobile (< 576px) */
        @media (max-width: 575px) {
            .chart-header {
                gap: 10px;
            }

            .chart-title {
                font-size: 14px;
            }

            .chart-container {
                height: 220px;
            }

            .filter-label {
                font-size: 12px;
            }

            .filter-group select {
                font-size: 12px;
                padding: 4px 8px;
            }

            .export-buttons {
                gap: 6px;
            }

            .export-buttons .btn {
                font-size: 11px;
                padding: 4px 8px;
                gap: 3px;
            }

            .export-buttons .btn i {
                font-size: 13px;
            }

            /* Hide text on very small screens, show icon only */
            .export-buttons .btn span.btn-text {
                display: none;
            }

            .table {
                font-size: 12px;
            }

            .table thead th {
                font-size: 11px;
                padding: 6px 4px;
            }

            .table tbody td {
                padding: 6px 4px;
            }

            .accordion-body {
                padding: 0.75rem 0.25rem;
            }

            .ps-4 {
                padding-left: 0.75rem !important;
            }
        }

        /* Extra Small Mobile (< 400px) */
        @media (max-width: 399px) {
            .chart-container {
                height: 200px;
            }

            .export-buttons .btn {
                font-size: 10px;
                padding: 4px 6px;
            }

            .table {
                font-size: 11px;
            }

            .table thead th,
            .table tbody td {
                padding: 5px 3px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <!-- Chart Card -->
        <div class="card mb-24">
            <div class="card-body">
                <div class="chart-header">
                    <p class="chart-title">Diagram Pendapatan Daerah</p>
                    <div class="chart-controls">
                        <div class="filter-group">
                            <label class="filter-label">Filter:</label>
                            <select class="form-select form-select-sm" id="sourceFilter" onchange="filterData()">
                                <option value="all">Semua Sumber</option>
                                <option value="PAD">PAD</option>
                                <option value="Transfer">Transfer</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </div>
                        <div class="export-buttons">
                            <button class="btn btn-success" onclick="exportToExcel()">
                                <i class="ri-file-excel-2-line"></i> <span class="btn-text">Excel</span>
                            </button>
                            <button class="btn btn-danger" onclick="exportToPDF()">
                                <i class="ri-file-pdf-line"></i> <span class="btn-text">PDF</span>
                            </button>
                            <button class="btn btn-info" onclick="exportToPNG()">
                                <i class="ri-image-line"></i> <span class="btn-text">PNG</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Accordion Card -->
        <div class="card">
            <div class="">
                <div class="accordion" id="revenueAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span class="fw-semibold">Detail Pendapatan Daerah</span>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#revenueAccordion">
                            <div class="accordion-body mt-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0" id="revenueTable">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="fw-semibold">Sumber</th>
                                                <th scope="col" class="text-end fw-semibold">Target</th>
                                                <th scope="col" class="text-end fw-semibold">Realisasi</th>
                                                <th scope="col" class="text-end fw-semibold">Persentase</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            <!-- Data will be populated by JavaScript -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/exceljs@4.3.0/dist/exceljs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
<script>
    // Full data structure
    const fullData = {
        PAD: {
            target: 2000000,
            realisasi: 1500000,
            details: [
                { name: '- Pajak Daerah', target: 1200000, realisasi: 900000, percentage: 75.0 },
                { name: '- Retribusi Daerah', target: 500000, realisasi: 400000, percentage: 80.0 },
                { name: '- Hasil Pengelolaan Kekayaan Daerah', target: 200000, realisasi: 150000, percentage: 75.0 },
                { name: '- Lain-lain PAD Sah', target: 100000, realisasi: 100000, percentage: 100.0 }
            ]
        },
        Transfer: {
            target: 2500000,
            realisasi: 1400000,
            details: [
                { name: '- Dana Perimbangan', target: 1500000, realisasi: 900000, percentage: 60.0 },
                { name: '- Dana Alokasi Umum', target: 700000, realisasi: 400000, percentage: 57.1 },
                { name: '- Dana Alokasi Khusus', target: 300000, realisasi: 100000, percentage: 33.3 }
            ]
        },
        'Lain-lain': {
            target: 500000,
            realisasi: 300000,
            details: [
                { name: '- Pendapatan Hibah', target: 200000, realisasi: 100000, percentage: 50.0 },
                { name: '- Dana Darurat', target: 300000, realisasi: 200000, percentage: 66.7 }
            ]
        }
    };

    const ctx = document.getElementById('revenueChart');
    let myChart;

    // Get responsive bar thickness based on screen width
    function getBarThickness() {
        const width = window.innerWidth;
        if (width < 400) return 30;
        if (width < 576) return 40;
        if (width < 768) return 60;
        if (width < 992) return 80;
        return 125;
    }

    // Get responsive font sizes
    function getResponsiveFontSizes() {
        const width = window.innerWidth;
        if (width < 400) {
            return { legend: 10, tick: 10 };
        } else if (width < 576) {
            return { legend: 11, tick: 11 };
        } else if (width < 768) {
            return { legend: 11, tick: 12 };
        }
        return { legend: 12, tick: 13 };
    }

    // Initialize chart
    function initChart(labels, targetData, realisasiData) {
        const barThickness = getBarThickness();
        const fontSizes = getResponsiveFontSizes();

        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'realisasi',
                    data: realisasiData,
                    backgroundColor: '#10B981',
                    borderRadius: 4,
                    barThickness: barThickness
                },
                {
                    label: 'target',
                    data: targetData,
                    backgroundColor: '#3B82F6',
                    borderRadius: 4,
                    barThickness: barThickness
                }
            ]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: window.innerWidth < 576 ? 10 : 15,
                            font: {
                                size: fontSizes.legend
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += new Intl.NumberFormat('id-ID').format(context.parsed.y);
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            drawBorder: false
                        },
                        ticks: {
                            font: {
                                size: fontSizes.tick
                            },
                            callback: function(value) {
                                return new Intl.NumberFormat('id-ID', {
                                    notation: 'compact',
                                    compactDisplay: 'short'
                                }).format(value);
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: fontSizes.tick
                            }
                        }
                    }
                }
            }
        };

        if (myChart) {
            myChart.destroy();
        }

        myChart = new Chart(ctx, config);
        applyThemeToChart();
    }

    // Handle window resize
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
            if (myChart) {
                const filterValue = document.getElementById('sourceFilter').value;
                filterData();
            }
        }, 250);
    });

    // Filter data function
    function filterData() {
        const filterValue = document.getElementById('sourceFilter').value;
        let labels = [];
        let targetData = [];
        let realisasiData = [];

        if (filterValue === 'all') {
            labels = ['PAD', 'Transfer', 'Lain-lain'];
            targetData = [fullData.PAD.target, fullData.Transfer.target, fullData['Lain-lain'].target];
            realisasiData = [fullData.PAD.realisasi, fullData.Transfer.realisasi, fullData['Lain-lain'].realisasi];
        } else {
            labels = [filterValue];
            targetData = [fullData[filterValue].target];
            realisasiData = [fullData[filterValue].realisasi];
        }

        initChart(labels, targetData, realisasiData);
        updateTable(filterValue);
    }

    // Update table function
    function updateTable(filterValue) {
        const tableBody = document.getElementById('tableBody');
        tableBody.innerHTML = '';

        if (filterValue === 'all') {
            Object.keys(fullData).forEach(source => {
                const percentage = ((fullData[source].realisasi / fullData[source].target) * 100).toFixed(1);
                
                const categoryRow = `
                    <tr class="table-light">
                        <td class="fw-bold">${source}</td>
                        <td class="text-end">Rp ${fullData[source].target.toLocaleString('id-ID')}</td>
                        <td class="text-end">Rp ${fullData[source].realisasi.toLocaleString('id-ID')}</td>
                        <td class="text-end">${percentage}%</td>
                    </tr>
                `;
                tableBody.innerHTML += categoryRow;

                fullData[source].details.forEach(detail => {
                    const detailRow = `
                        <tr>
                            <td class="ps-4">${detail.name}</td>
                            <td class="text-end">Rp ${detail.target.toLocaleString('id-ID')}</td>
                            <td class="text-end">Rp ${detail.realisasi.toLocaleString('id-ID')}</td>
                            <td class="text-end">${detail.percentage}%</td>
                        </tr>
                    `;
                    tableBody.innerHTML += detailRow;
                });
            });
        } else {
            const source = fullData[filterValue];
            const percentage = ((source.realisasi / source.target) * 100).toFixed(1);
            
            const categoryRow = `
                <tr class="table-light">
                    <td class="fw-bold">${filterValue}</td>
                    <td class="text-end">Rp ${source.target.toLocaleString('id-ID')}</td>
                    <td class="text-end">Rp ${source.realisasi.toLocaleString('id-ID')}</td>
                    <td class="text-end">${percentage}%</td>
                </tr>
            `;
            tableBody.innerHTML += categoryRow;

            source.details.forEach(detail => {
                const detailRow = `
                    <tr>
                        <td class="ps-4">${detail.name}</td>
                        <td class="text-end">Rp ${detail.target.toLocaleString('id-ID')}</td>
                        <td class="text-end">Rp ${detail.realisasi.toLocaleString('id-ID')}</td>
                        <td class="text-end">${detail.percentage}%</td>
                    </tr>
                `;
                tableBody.innerHTML += detailRow;
            });
        }

        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        updateTableTheme(isDark);
    }

    function applyThemeToChart() {
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        if (myChart) {
            myChart.options.scales.y.grid.color = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
            myChart.options.scales.y.ticks.color = isDark ? '#fff' : '#666';
            myChart.options.scales.x.ticks.color = isDark ? '#fff' : '#666';
            myChart.options.plugins.legend.labels.color = isDark ? '#fff' : '#666';
            myChart.update('none');
        }
    }

    function updateChartTheme(isDark) {
        if (myChart) {
            myChart.options.scales.y.grid.color = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
            myChart.options.scales.y.ticks.color = isDark ? '#fff' : '#666';
            myChart.options.scales.x.ticks.color = isDark ? '#fff' : '#666';
            myChart.options.plugins.legend.labels.color = isDark ? '#fff' : '#666';
            myChart.update('none');
        }
    }

    function updateTableTheme(isDark) {
        const tables = document.querySelectorAll('.table');
        tables.forEach(table => {
            if (isDark) {
                table.classList.add('table-dark');
            } else {
                table.classList.remove('table-dark');
            }
        });
    }

    function updateTitlesTheme(isDark) {
        const chartTitle = document.querySelector('.chart-title');
        if (chartTitle) {
            chartTitle.style.color = isDark ? '#fff' : '#333';
        }
        
        const accordionButtons = document.querySelectorAll('.accordion-button');
        accordionButtons.forEach(button => {
            button.style.color = isDark ? '#fff' : '#333';
        });

        const filterLabel = document.querySelector('.filter-label');
        if (filterLabel) {
            filterLabel.style.color = isDark ? '#fff' : '#333';
        }
    }

    const htmlElement = document.documentElement;
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.type === 'attributes' && mutation.attributeName === 'data-theme') {
                const currentTheme = htmlElement.getAttribute('data-theme');
                const isDark = currentTheme === 'dark';
                
                updateChartTheme(isDark);
                updateTableTheme(isDark);
                updateTitlesTheme(isDark);
            }
        });
    });

    observer.observe(htmlElement, {
        attributes: true,
        attributeFilter: ['data-theme']
    });

    filterData();

    const initialTheme = htmlElement.getAttribute('data-theme');
    const isInitialDark = initialTheme === 'dark';
    updateTitlesTheme(isInitialDark);

    // Export Functions (sama seperti sebelumnya)
    async function exportToExcel() {
        const chartCanvas = document.getElementById('revenueChart');
        const chartImage = chartCanvas.toDataURL('image/png').split(',')[1];

        const workbook = new ExcelJS.Workbook();
        const worksheet = workbook.addWorksheet('Pendapatan Daerah');

        worksheet.mergeCells('A1:D1');
        worksheet.getCell('A1').value = 'Laporan Pendapatan Daerah';
        worksheet.getCell('A1').font = { size: 16, bold: true };
        worksheet.getCell('A1').alignment = { vertical: 'middle', horizontal: 'center' };
        worksheet.getRow(1).height = 30;

        const imageId = workbook.addImage({
            base64: chartImage,
            extension: 'png',
        });

        worksheet.addImage(imageId, {
            tl: { col: 0, row: 2 },
            ext: { width: 600, height: 300 }
        });

        const startRow = 16;

        worksheet.getCell(`A${startRow}`).value = 'Sumber';
        worksheet.getCell(`B${startRow}`).value = 'Target';
        worksheet.getCell(`C${startRow}`).value = 'Realisasi';
        worksheet.getCell(`D${startRow}`).value = 'Persentase';

        worksheet.getRow(startRow).font = { bold: true };
        worksheet.getRow(startRow).fill = {
            type: 'pattern',
            pattern: 'solid',
            fgColor: { argb: 'FFE0E0E0' }
        };

        const table = document.getElementById('revenueTable');
        const rows = table.querySelectorAll('tbody tr');
        
        let currentRow = startRow + 1;
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const rowData = [];
            cells.forEach(cell => {
                rowData.push(cell.textContent.trim());
            });
            
            worksheet.getRow(currentRow).values = rowData;
            
            if (row.classList.contains('table-light')) {
                worksheet.getRow(currentRow).font = { bold: true };
                worksheet.getRow(currentRow).fill = {
                    type: 'pattern',
                    pattern: 'solid',
                    fgColor: { argb: 'FFF3F4F6' }
                };
            }
            
            currentRow++;
        });

        worksheet.getColumn(1).width = 40;
        worksheet.getColumn(2).width = 20;
        worksheet.getColumn(3).width = 20;
        worksheet.getColumn(4).width = 15;

        for (let i = startRow; i < currentRow; i++) {
            ['A', 'B', 'C', 'D'].forEach(col => {
                worksheet.getCell(`${col}${i}`).border = {
                    top: { style: 'thin' },
                    left: { style: 'thin' },
                    bottom: { style: 'thin' },
                    right: { style: 'thin' }
                };
            });
        }

        for (let i = startRow; i < currentRow; i++) {
            worksheet.getCell(`B${i}`).alignment = { horizontal: 'right' };
            worksheet.getCell(`C${i}`).alignment = { horizontal: 'right' };
            worksheet.getCell(`D${i}`).alignment = { horizontal: 'right' };
        }

        const buffer = await workbook.xlsx.writeBuffer();
        const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
        saveAs(blob, 'Laporan_Pendapatan_Daerah.xlsx');
    }

    async function exportToPDF() {
        const { jsPDF } = window.jspdf;
        
        const accordion = document.getElementById('collapseOne');
        const wasCollapsed = !accordion.classList.contains('show');
        
        if (wasCollapsed) {
            accordion.classList.add('show');
        }

        await new Promise(resolve => setTimeout(resolve, 300));

        const chartCanvas = document.getElementById('revenueChart');
        const chartImage = chartCanvas.toDataURL('image/png', 1.0);

        const table = document.getElementById('revenueTable');
        const tableClone = table.cloneNode(true);
        tableClone.classList.remove('table-dark');
        
        const tempDiv = document.createElement('div');
        tempDiv.style.position = 'absolute';
        tempDiv.style.left = '-9999px';
        tempDiv.style.top = '0';
        tempDiv.style.width = '800px';
        tempDiv.style.padding = '20px';
        tempDiv.style.backgroundColor = 'white';
        
        tempDiv.innerHTML = `
            <h5 style="color: #333; margin-bottom: 20px;">Laporan Pendapatan Daerah</h5>
            <div style="margin-bottom: 20px;">
                <img src="${chartImage}" style="width: 100%; height: auto;" />
            </div>
        `;
        tempDiv.appendChild(tableClone);
        
        document.body.appendChild(tempDiv);

        html2canvas(tempDiv, {
            scale: 2,
            backgroundColor: '#ffffff',
            logging: false
        }).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const pdf = new jsPDF('p', 'mm', 'a4');
            
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = pdf.internal.pageSize.getHeight();
            const imgWidth = pdfWidth;
            const imgHeight = (canvas.height * pdfWidth) / canvas.width;
            
            let heightLeft = imgHeight;
            let position = 0;

            pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= pdfHeight;

            while (heightLeft > 0) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pdfHeight;
            }

            pdf.save('Laporan_Pendapatan_Daerah.pdf');
            
            document.body.removeChild(tempDiv);
            if (wasCollapsed) {
                accordion.classList.remove('show');
            }
        });
    }

    async function exportToPNG() {
        const accordion = document.getElementById('collapseOne');
        const wasCollapsed = !accordion.classList.contains('show');
        
        if (wasCollapsed) {
            accordion.classList.add('show');
        }

        await new Promise(resolve => setTimeout(resolve, 300));

        const chartCanvas = document.getElementById('revenueChart');
        const chartImage = chartCanvas.toDataURL('image/png', 1.0);

        const table = document.getElementById('revenueTable');
        const tableClone = table.cloneNode(true);
        tableClone.classList.remove('table-dark');
        
        const tempDiv = document.createElement('div');
        tempDiv.style.position = 'absolute';
        tempDiv.style.left = '-9999px';
        tempDiv.style.top = '0';
        tempDiv.style.width = '800px';
        tempDiv.style.padding = '20px';
        tempDiv.style.backgroundColor = 'white';
        
        tempDiv.innerHTML = `
            <h5 style="color: #333; margin-bottom: 20px;">Laporan Pendapatan Daerah</h5>
            <div style="margin-bottom: 20px;">
                <img src="${chartImage}" style="width: 100%; height: auto;" />
            </div>
        `;
        tempDiv.appendChild(tableClone);
        
        document.body.appendChild(tempDiv);

        html2canvas(tempDiv, {
            scale: 2,
            backgroundColor: '#ffffff',
            logging: false
        }).then(canvas => {
            const link = document.createElement('a');
            link.download = 'Laporan_Pendapatan_Daerah.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
            
            document.body.removeChild(tempDiv);
            if (wasCollapsed) {
                accordion.classList.remove('show');
            }
        });
    }
</script>
@endpush
