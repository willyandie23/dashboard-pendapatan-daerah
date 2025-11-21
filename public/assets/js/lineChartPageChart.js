// =========================== Default Line Chart Start ===============================
var defaultLineChartElement = document.querySelector("#defaultLineChart");
if (defaultLineChartElement) {
    var options = {
        series: [{
            name: "This month",
            data: [0, 48, 20, 24, 6, 33, 30, 48, 35, 18, 20, 5]
        }],
        chart: {
            height: 264,
            type: 'line',
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            colors: ['#487FFF'],
            width: 4
        },
        markers: {
            size: 0,
            strokeWidth: 3,
            hover: {
                size: 8
            }
        },
        tooltip: {
            enabled: true,
            x: {
                show: true,
            },
            y: {
                show: false,
            },
            z: {
                show: false,
            }
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'],
                opacity: 0.5
            },
            borderColor: '#D1D5DB',
            strokeDashArray: 3,
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return "$" + value + "k";
                },
                style: {
                    fontSize: "14px"
                }
            },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            tooltip: {
                enabled: false
            },
            labels: {
                formatter: function (value) {
                    return value;
                },
                style: {
                    fontSize: "14px"
                }
            },
            axisBorder: {
                show: false
            },
        }
    };

    var chart = new ApexCharts(defaultLineChartElement, options);
    chart.render();
}
// =========================== Default Line Chart End ===============================


// =========================== Zoom able Line Chart Start ===============================
function createChartTwo(chartId, chartColor) {
    var chartElement = document.querySelector(`#${chartId}`);
    if (chartElement) {
        var options = {
            series: [
                {
                    name: 'This Day',
                    data: [12, 18, 12, 48, 18, 30, 18, 15, 88, 40, 65, 24, 48],
                },
            ],
            chart: {
                type: 'area',
                width: '100%',
                height: 264,
                sparkline: {
                    enabled: false
                },
                toolbar: {
                    show: false
                },
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight',
                width: 4,
                colors: [chartColor],
                lineCap: 'round'
            },
            grid: {
                show: true,
                borderColor: '#D1D5DB',
                strokeDashArray: 3,
                position: 'back',
                xaxis: {
                    lines: {
                        show: false
                    }
                },   
                yaxis: {
                    lines: {
                        show: true
                    }
                },  
                row: {
                    colors: undefined,
                    opacity: 0.5
                },  
                column: {
                    colors: undefined,
                    opacity: 0.5
                },  
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },  
            },
            fill: {
                type: 'gradient',
                colors: [chartColor],
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.5,
                    gradientToColors: [`${chartColor}00`],
                    inverseColors: false,
                    opacityFrom: .6,
                    opacityTo: 0.3,
                    stops: [0, 100],
                },
            },
            markers: {
                colors: [chartColor],
                strokeWidth: 3,
                size: 0,
                hover: {
                    size: 10
                }
            },
            xaxis: {
                categories: [`Jan`, `Feb`, `Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dec`],
                tooltip: {
                    enabled: false
                },
                labels: {
                    formatter: function (value) {
                        return value;
                    },
                    style: {
                        fontSize: "14px"
                    }
                },
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return "$" + value + "k";
                    },
                    style: {
                        fontSize: "14px"
                    }
                },
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(chartElement, options);
        chart.render();
    }
}
createChartTwo('zoomAbleLineChart', '#487fff');
// =========================== Zoom able Line Chart End ===============================


// =========================== Line Chart With Data labels Start ===============================
var lineDataLabelElement = document.querySelector("#lineDataLabel");
if (lineDataLabelElement) {
    var options = {
        series: [{
            name: "Desktops",
            data: [5, 25, 35, 15, 21, 15, 35, 35, 51]
        }],
        chart: {
            height: 264,
            type: 'line',
            colors: '#000',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            },
        },
        colors: ['#487FFF'],
        dataLabels: {
            enabled: true
        },
        stroke: {
            curve: 'straight',
            width: 4,
            color: "#000"
        },
        markers: {
            colors: '#487FFF',
            strokeWidth: 3,
            size: 0,
            hover: {
                size: 10
            }
        },
        grid: {
            show: true,
            borderColor: '#D1D5DB',
            strokeDashArray: 3,
            row: {
                colors: ['#f3f3f3', 'transparent'],
                opacity: 0,
            },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            lines: {
                show: false
            }
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return "$" + value + "k";
                },
                style: {
                    fontSize: "14px"
                }
            },
        },
    };

    var chart = new ApexCharts(lineDataLabelElement, options);
    chart.render();
}
// =========================== Line Chart With Data labels End ===============================


// =========================== Double Line Chart Start ===============================
// function createLineChart(chartId, chartColor) {
//     var chartElement = document.querySelector(`#${chartId}`);
//     if (chartElement) {
//         var options = {
//             series: [
//                 {
//                     name: 'Target',
//                     data: [800000, 150000, 90000, 200000, 100000, 330000, 130000, 220000, 80000, 170000, 100000, 150000],
//                 },
//                 {
//                     name: 'Realisasi',
//                     data: [80000, 240000, 180000, 400000, 180000, 480000, 220000, 380000, 180000, 300000, 200000, 280000],
//                 },
//             ],
//             chart: {
//                 type: 'line',
//                 width: '100%',
//                 height: 264,
//                 sparkline: {
//                     enabled: false
//                 },
//                 toolbar: {
//                     show: false
//                 },
//                 padding: {
//                     left: 0,
//                     right: 0,
//                     top: 0,
//                     bottom: 0
//                 }
//             },
//             colors: ['#487FFF', '#FF9F29'],
//             dataLabels: {
//                 enabled: false
//             },
//             stroke: {
//                 curve: 'smooth',
//                 width: 4,
//                 colors: ["#FF9F29", chartColor],
//                 lineCap: 'round',
//             },
//             grid: {
//                 show: true,
//                 borderColor: '#D1D5DB',
//                 strokeDashArray: 3,
//                 position: 'back',
//                 xaxis: {
//                     lines: {
//                         show: false
//                     }
//                 },   
//                 yaxis: {
//                     lines: {
//                         show: true
//                     }
//                 },  
//                 row: {
//                     colors: undefined,
//                     opacity: 0.5
//                 },  
//                 column: {
//                     colors: undefined,
//                     opacity: 0.5
//                 },  
//                 padding: {
//                     top: 0,
//                     right: 0,
//                     bottom: 0,
//                     left: 0
//                 },  
//             },
//             markers: {
//                 colors: ["#FF9F29", chartColor],
//                 strokeWidth: 3,
//                 size: 0,
//                 hover: {
//                     size: 10
//                 }
//             },
//             xaxis: {
//                 categories: [`Jan`, `Feb`, `Mar`, `Apr`, `Mei`, `Jun`, `Jul`, `Agu`, `Sep`, `Okt`, `Nov`, `Des`],
//                 tooltip: {
//                     enabled: false,        
//                 },
//                 labels: {
//                     formatter: function (value) {
//                         return value;
//                     },
//                     style: {
//                         fontSize: "10px"
//                     }
//                 },
//             },
//             yaxis: {
//                 min: 0,
//                 max: 1000000,
//                 tickAmount: 4,
//                 labels: {
//                     formatter: function (value) {
//                         return value.toLocaleString();
//                     },
//                     style: {
//                         fontSize: "10px"
//                     }
//                 },
//             },
//             tooltip: {
//                 x: {
//                     format: 'dd/MM/yy HH:mm'
//                 },
//             },
//             legend: {
//                 show: false
//             }
//         };

//         var chart = new ApexCharts(chartElement, options);
//         chart.render();
//     }
// }
// createLineChart('doubleLineChart', '#487fff');

// Variabel global untuk menyimpan state chart
let lineChartInstance = null;
let currentChartMode = 'monthly'; // 'monthly' atau 'quarterly'
let monthlyData = null;
let quarterlyData = null;

// Function untuk ambil data bulanan dari API
async function fetchMonthlyData() {
    try {
        const response = await fetch("/api/komposisi-sumber-pendapatan-bulanan", {
            method: "GET",
            headers: {
                "Accept": "application/json"
            }
        });
        const result = await response.json();
        
        if (result.status === 200 && Array.isArray(result.data)) {
            // Filter berdasarkan tahun yang dipilih
            const year = localStorage.getItem('selectedYear') || new Date().getFullYear();
            const filteredData = result.data.filter(d => d.tahun == year);
            
            monthlyData = {
                categories: filteredData.map(d => d.bulan),
                target: filteredData.map(d => d.target),
                realisasi: filteredData.map(d => d.realisasi)
            };
        }
    } catch (err) {
        console.error('Error fetching monthly data:', err);
    }
}

// Function untuk ambil data triwulan dari API
async function fetchQuarterlyData() {
    try {
        const response = await fetch("/api/komposisi-sumber-pendapatan-triwulan", {
            method: "GET",
            headers: {
                "Accept": "application/json"
            }
        });
        const result = await response.json();
        
        if (result.status === 200 && Array.isArray(result.data)) {
            // Filter berdasarkan tahun yang dipilih
            const year = localStorage.getItem('selectedYear') || new Date().getFullYear();
            const filteredData = result.data.filter(d => d.tahun == year);
            
            quarterlyData = {
                categories: filteredData.map(d => d.triwulan.trim()), // Ubah dari nama_triwulan ke triwulan, dan trim() untuk hapus spasi
                target: filteredData.map(d => d.target),
                realisasi: filteredData.map(d => d.realisasi)
            };
            
            console.log('Quarterly Data:', quarterlyData); // Debug
        }
    } catch (err) {
        console.error('Error fetching quarterly data:', err);
    }
}

function createLineChart(chartId, chartColor, mode = 'monthly') {
    var chartElement = document.querySelector(`#${chartId}`);
    if (chartElement) {
        // Pilih data berdasarkan mode
        const data = mode === 'monthly' ? monthlyData : quarterlyData;
        
        if (!data) {
            chartElement.innerHTML = "<p>Data tidak tersedia</p>";
            return;
        }
        
        var options = {
            series: [
                {
                    name: 'Target',
                    data: data.target,
                },
                {
                    name: 'Realisasi',
                    data: data.realisasi,
                },
            ],
            chart: {
                type: 'line',
                width: '100%',
                height: 264,
                sparkline: {
                    enabled: false
                },
                toolbar: {
                    show: false
                },
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            },
            colors: ['#487FFF', '#FF9F29'],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 4,
                colors: ["#487FFF", "#FF9F29"],
                lineCap: 'round',
            },
            grid: {
                show: true,
                borderColor: '#D1D5DB',
                strokeDashArray: 3,
                position: 'back',
                xaxis: {
                    lines: {
                        show: false
                    }
                },   
                yaxis: {
                    lines: {
                        show: true
                    }
                },  
                row: {
                    colors: undefined,
                    opacity: 0.5
                },  
                column: {
                    colors: undefined,
                    opacity: 0.5
                },  
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },  
            },
            markers: {
                colors: ["#487FFF", "#FF9F29"],
                strokeWidth: 3,
                size: 0,
                hover: {
                    size: 10
                }
            },
            xaxis: {
                categories: data.categories,
                tooltip: {
                    enabled: false,        
                },
                labels: {
                    formatter: function (value) {
                        return value;
                    },
                    style: {
                        fontSize: "10px"
                    }
                },
            },
            yaxis: {
                min: 0,
                tickAmount: 4,
                labels: {
                    formatter: function (value) {
                        return (value / 1000000000).toFixed(0) + 'M';
                    },
                    style: {
                        fontSize: "10px"
                    }
                },
            },
            tooltip: {
                y: {
                    formatter: function (value) {
                        return new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }).format(value);
                    }
                }
            },
            legend: {
                show: false
            }
        };

        // Destroy chart lama jika ada
        if (lineChartInstance) {
            lineChartInstance.destroy();
        }

        lineChartInstance = new ApexCharts(chartElement, options);
        lineChartInstance.render();
    }
}

// Function untuk update button active state
function updateButtonState(mode) {
    const monthlyBtn = document.getElementById('monthlyButton');
    const quarterlyBtn = document.getElementById('quarterlyButton');

    if (mode === 'monthly') {
        monthlyBtn.classList.remove('btn-outline-info');
        monthlyBtn.classList.add('btn-info');
        quarterlyBtn.classList.remove('btn-info');
        quarterlyBtn.classList.add('btn-outline-info');
    } else {
        quarterlyBtn.classList.remove('btn-outline-info');
        quarterlyBtn.classList.add('btn-info');
        monthlyBtn.classList.remove('btn-info');
        monthlyBtn.classList.add('btn-outline-info');
    }
}

// Function untuk handle button click
function setupLineChartButtons() {
    const monthlyBtn = document.getElementById('monthlyButton');
    const quarterlyBtn = document.getElementById('quarterlyButton');

    if (monthlyBtn) {
        monthlyBtn.addEventListener('click', function() {
            currentChartMode = 'monthly';
            updateButtonState('monthly');
            createLineChart('doubleLineChart', '#487fff', 'monthly');
        });
    }

    if (quarterlyBtn) {
        quarterlyBtn.addEventListener('click', function() {
            currentChartMode = 'quarterly';
            updateButtonState('quarterly');
            createLineChart('doubleLineChart', '#487fff', 'quarterly');
        });
    }
}

// Function untuk reload chart saat tahun berubah
async function renderLineChart(year) {
    await fetchMonthlyData();
    await fetchQuarterlyData();
    createLineChart('doubleLineChart', '#487fff', currentChartMode);
}

// Initialize chart dan button saat page load
document.addEventListener('DOMContentLoaded', async function() {
    await fetchMonthlyData();
    await fetchQuarterlyData();
    
    // SET BUTTON BULANAN SEBAGAI DEFAULT AKTIF
    updateButtonState('monthly');
    
    // RENDER CHART BULANAN
    createLineChart('doubleLineChart', '#487fff', 'monthly');
    
    // SETUP BUTTON LISTENERS
    setupLineChartButtons();
});


// =========================== Double Line Chart End ===============================


// =========================== Step Line Chart Start ===============================
var stepLineChartElement = document.querySelector("#stepLineChart");
if (stepLineChartElement) {
    var options = {
        series: [{
            data: [16, 25, 38, 50, 32, 20, 42, 18, 4, 25, 12, 12],
            name: "Example",
        }],
        chart: {
            type: 'line',
            height: 270,
            toolbar: {
                show: false
            },
        },
        stroke: {
            curve: 'stepline',
        },
        colors: ['#487FFF'],
        dataLabels: {
            enabled: false
        },
        markers: {
            hover: {
                sizeOffset: 4
            }
        },
        grid: {
            show: true,
            borderColor: '#D1D5DB',
            strokeDashArray: 3,
            position: 'back',
        },
        xaxis: {
            categories: [`Jan`, `Feb`, `Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dec`],
            tooltip: {
                enabled: false,        
            },
            labels: {
                formatter: function (value) {
                    return value;
                },
                style: {
                    fontSize: "14px"
                }
            },
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return "$" + value + "k";
                },
                style: {
                    fontSize: "14px"
                }
            },
        },
    };

    var chart = new ApexCharts(stepLineChartElement, options);
    chart.render();
}
// =========================== Step Line Chart End ===============================


// =========================== Gradient Line Chart Start ===============================
var gradientLineChartElement = document.querySelector("#gradientLineChart");
if (gradientLineChartElement) {
    var options = {
        series: [{
            name: "This month",
            data: [12, 6, 22, 18, 38, 16, 40, 8, 35, 18, 35, 22, 50]
        }],
        chart: {
            height: 264,
            type: 'line',
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            colors: ['#FF9F29'],
            width: 4
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                gradientToColors: ['#0E53F4'],
                shadeIntensity: 1,
                type: 'horizontal',
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
            },
        },
        markers: {
            size: 0,
            strokeWidth: 3,
            hover: {
                size: 8
            }
        },
        tooltip: {
            enabled: true,
            x: {
                show: true,
            },
            y: {
                show: false,
            },
            z: {
                show: false,
            }
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'],
                opacity: 0.5
            },
            borderColor: '#D1D5DB',
            strokeDashArray: 3,
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return "$" + value + "k";
                },
                style: {
                    fontSize: "14px"
                }
            },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            tooltip: {
                enabled: false
            },
            labels: {
                formatter: function (value) {
                    return value;
                },
                style: {
                    fontSize: "14px"
                }
            },
            axisBorder: {
                show: false
            },
        }
    };

    var chart = new ApexCharts(gradientLineChartElement, options);
    chart.render();
}
// =========================== Gradient Line Chart End ===============================
