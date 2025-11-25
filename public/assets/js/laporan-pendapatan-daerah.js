let myChart;
const ctx = document.getElementById('revenueChart');

function getCurrentData() {
    return window.revenueData || {
        PAD: { target: 0, realisasi: 0, details: [] },
        Transfer: { target: 0, realisasi: 0, details: [] },
        'Lain-lain': { target: 0, realisasi: 0, details: [] }
    };
}

function getBarThickness() {
    const w = window.innerWidth;
    if (w < 400) return 30;
    if (w < 576) return 40;
    if (w < 768) return 60;
    if (w < 992) return 80;
    return 125;
}

function getResponsiveFontSizes() {
    const w = window.innerWidth;
    if (w < 400) return { legend: 10, tick: 10 };
    if (w < 576) return { legend: 11, tick: 11 };
    if (w < 768) return { legend: 11, tick: 12 };
    return { legend: 12, tick: 13 };
}

function initChart(labels, targetData, realisasiData) {
    const barThickness = getBarThickness();
    const fontSizes = getResponsiveFontSizes();
    const w = window.innerWidth;

    const data = {
        labels: labels,
        datasets: [
            { label: 'Realisasi', data: realisasiData, backgroundColor: '#10B981', borderRadius: 4, barThickness },
            { label: 'Target',     data: targetData,     backgroundColor: '#3B82F6', borderRadius: 4, barThickness }
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
                        padding: w < 576 ? 10 : 15,
                        font: { size: fontSizes.legend }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: ctx => `${ctx.dataset.label}: Rp ${ctx.parsed.y.toLocaleString('id-ID')}`
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: true   // GARIS HORIZONTAL HILANG!
                    },
                    ticks: {
                        font: { size: fontSizes.tick },
                        callback: v => new Intl.NumberFormat('id-ID', { notation: 'compact', compactDisplay: 'short' }).format(v)
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: { font: { size: fontSizes.tick } }
                }
            }
        }
    };

    if (myChart) myChart.destroy();
    myChart = new Chart(ctx, config);
    applyThemeToChart();
}

let resizeTimeout;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(filterData, 250);
});

function filterData() {
    const data = getCurrentData();
    const filterValue = document.getElementById('sourceFilter').value || 'all';
    let labels = [], targetData = [], realisasiData = [];

    if (filterValue === 'all') {
        labels = ['PAD', 'Transfer', 'Lain-lain'];
        targetData = [data.PAD.target, data.Transfer.target, data['Lain-lain'].target];
        realisasiData = [data.PAD.realisasi, data.Transfer.realisasi, data['Lain-lain'].realisasi];
    } else {
        labels = [filterValue];
        targetData = [data[filterValue].target];
        realisasiData = [data[filterValue].realisasi];
    }

    initChart(labels, targetData, realisasiData);
    updateTable(filterValue);
}

function updateTable(filterValue) {
    const data = getCurrentData();
    const tbody = document.getElementById('tableBody');
    tbody.innerHTML = '';
    const fmt = num => 'Rp ' + Number(num).toLocaleString('id-ID');

    if (filterValue === 'all') {
        Object.keys(data).forEach(key => {
            const persen = data[key].target > 0 ? ((data[key].realisasi / data[key].target) * 100).toFixed(2) : '0.00';
            tbody.innerHTML += `<tr class="table-light"><td class="fw-bold">${key}</td><td class="text-end">${fmt(data[key].target)}</td><td class="text-end">${fmt(data[key].realisasi)}</td><td class="text-end">${persen}%</td></tr>`;
            data[key].details.forEach(d => {
                tbody.innerHTML += `<tr><td class="ps-4">${d.name}</td><td class="text-end">${fmt(d.target)}</td><td class="text-end">${fmt(d.realisasi)}</td><td class="text-end">${d.percentage}%</td></tr>`;
            });
        });
    } else {
        const src = data[filterValue];
        const persen = src.target > 0 ? ((src.realisasi / src.target) * 100).toFixed(2) : '0.00';
        tbody.innerHTML += `<tr class="table-light"><td class="fw-bold">${filterValue}</td><td class="text-end">${fmt(src.target)}</td><td class="text-end">${fmt(src.realisasi)}</td><td class="text-end">${persen}%</td></tr>`;
        src.details.forEach(d => {
            tbody.innerHTML += `<tr><td class="ps-4">${d.name}</td><td class="text-end">${fmt(d.target)}</td><td class="text-end">${fmt(d.realisasi)}</td><td class="text-end">${d.percentage}%</td></tr>`;
        });
    }

    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
    document.querySelectorAll('.table').forEach(t => isDark ? t.classList.add('table-dark') : t.classList.remove('table-dark'));
}

function applyThemeToChart() {
    if (!myChart) return;
    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
    myChart.options.scales.y.grid.color = isDark ? 'rgba(255,255,255,0.1)' : 'rgba(0,0,0,0.1)';
    myChart.options.scales.y.ticks.color = isDark ? '#fff' : '#666';
    myChart.options.scales.x.ticks.color = isDark ? '#fff' : '#666';
    myChart.options.plugins.legend.labels.color = isDark ? '#fff' : '#666';
    myChart.update('none');
}

new MutationObserver(() => {
    applyThemeToChart();
    updateTable(document.getElementById('sourceFilter').value || 'all');
}).observe(document.documentElement, { attributes: true, attributeFilter: ['data-theme'] });

// ==================== EXPORT EXCEL ====================
async function exportToExcel() {
    const chartCanvas = document.getElementById('revenueChart');
    const chartImage = chartCanvas.toDataURL('image/png').split(',')[1];

    const workbook = new ExcelJS.Workbook();
    const worksheet = workbook.addWorksheet('Pendapatan Daerah');

    worksheet.mergeCells('A1:D1');
    worksheet.getCell('A1').value = `Laporan Pendapatan Daerah Tahun ${localStorage.getItem('selectedYear') || new Date().getFullYear()}`;
    worksheet.getCell('A1').font = { size: 16, bold: true };
    worksheet.getCell('A1').alignment = { horizontal: 'center' };
    worksheet.getRow(1).height = 30;

    const imageId = workbook.addImage({ base64: chartImage, extension: 'png' });
    worksheet.addImage(imageId, { tl: { col: 0, row: 2 }, ext: { width: 600, height: 300 } });

    const startRow = 16;
    worksheet.getCell(`A${startRow}`).value = 'Sumber';
    worksheet.getCell(`B${startRow}`).value = 'Target';
    worksheet.getCell(`C${startRow}`).value = 'Realisasi';
    worksheet.getCell(`D${startRow}`).value = 'Persentase';
    worksheet.getRow(startRow).font = { bold: true };
    worksheet.getRow(startRow).fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: 'FFE0E0E0' } };

    const rows = document.querySelectorAll('#revenueTable tbody tr');
    let currentRow = startRow + 1;
    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        const rowData = [];
        cells.forEach(cell => rowData.push(cell.textContent.trim()));
        worksheet.getRow(currentRow).values = rowData;
        if (row.classList.contains('table-light')) {
            worksheet.getRow(currentRow).font = { bold: true };
            worksheet.getRow(currentRow).fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: 'FFF3F4F6' } };
        }
        currentRow++;
    });

    worksheet.getColumn(1).width = 40;
    worksheet.getColumn(2).width = 20;
    worksheet.getColumn(3).width = 20;
    worksheet.getColumn(4).width = 15;

    const buffer = await workbook.xlsx.writeBuffer();
    saveAs(new Blob([buffer]), `Laporan_Pendapatan_Daerah_${localStorage.getItem('selectedYear') || new Date().getFullYear()}.xlsx`);
}

// ==================== EXPORT PDF ====================
async function exportToPDF() {
    const { jsPDF } = window.jspdf;
    const accordion = document.getElementById('collapseOne');
    const wasCollapsed = !accordion.classList.contains('show');
    if (wasCollapsed) accordion.classList.add('show');
    await new Promise(r => setTimeout(r, 300));

    const chartImg = document.getElementById('revenueChart').toDataURL('image/png', 1.0);
    const tableClone = document.getElementById('revenueTable').cloneNode(true);
    tableClone.classList.remove('table-dark');

    const div = document.createElement('div');
    div.style.cssText = 'position:absolute;left:-9999px;width:800px;padding:20px;background:white;';
    div.innerHTML = `<h5>Laporan Pendapatan Daerah Tahun ${localStorage.getItem('selectedYear') || new Date().getFullYear()}</h5><img src="${chartImg}" style="width:100%;margin:20px 0;">`;
    div.appendChild(tableClone);
    document.body.appendChild(div);

    html2canvas(div, { scale: 2, backgroundColor: '#fff' }).then(canvas => {
        const pdf = new jsPDF('p', 'mm', 'a4');
        const imgData = canvas.toDataURL('image/png');
        const width = pdf.internal.pageSize.getWidth();
        const height = (canvas.height * width) / canvas.width;
        pdf.addImage(imgData, 'PNG', 0, 0, width, height);
        pdf.save(`Laporan_Pendapatan_Daerah_${localStorage.getItem('selectedYear') || new Date().getFullYear()}.pdf`);
        document.body.removeChild(div);
        if (wasCollapsed) accordion.classList.remove('show');
    });
}

// ==================== EXPORT PNG ====================
async function exportToPNG() {
    const accordion = document.getElementById('collapseOne');
    const wasCollapsed = !accordion.classList.contains('show');
    if (wasCollapsed) accordion.classList.add('show');
    await new Promise(r => setTimeout(r, 300));

    const chartImg = document.getElementById('revenueChart').toDataURL('image/png', 1.0);
    const tableClone = document.getElementById('revenueTable').cloneNode(true);
    tableClone.classList.remove('table-dark');

    const div = document.createElement('div');
    div.style.cssText = 'position:absolute;left:-9999px;width:800px;padding:20px;background:white;';
    div.innerHTML = `<h5>Laporan Pendapatan Daerah Tahun ${localStorage.getItem('selectedYear') || new Date().getFullYear()}</h5><img src="${chartImg}" style="width:100%;margin:20px 0;">`;
    div.appendChild(tableClone);
    document.body.appendChild(div);

    html2canvas(div, { scale: 2, backgroundColor: '#fff' }).then(canvas => {
        const a = document.createElement('a');
        a.download = `Laporan_Pendapatan_Daerah_${localStorage.getItem('selectedYear') || new Date().getFullYear()}.png`;
        a.href = canvas.toDataURL();
        a.click();
        document.body.removeChild(div);
        if (wasCollapsed) accordion.classList.remove('show');
    });
}

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('sourceFilter').addEventListener('change', filterData);
    filterData();
});