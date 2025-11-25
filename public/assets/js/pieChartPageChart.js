// ============================ Pie Chart Start ==========================
// var pieChartElement = document.querySelector("#pieChart");
// if (pieChartElement) {
//     var options = {
//         series: [70, 80, 90],
//         chart: {
//             height: 264,
//             type: 'pie',
//         },
//         stroke: {
//             show: false
//         },
//         labels: ['PAD', 'Transfer', 'Lain-lain'],
//         colors: ['#487FFF', "#FF9F29", '#45B369'],
//         plotOptions: {
//             pie: {
//                 dataLabels: {
//                     dropShadow: {
//                         enabled: true,
//                     },
//                 },
//             }
//         },
//         legend: {
//             position: 'bottom',
//             horizontalAlign: 'center'
//         },
//         responsive: [{
//             breakpoint: 480,
//             options: {
//                 chart: {
//                     width: 200
//                 },
//                 legend: {
//                     show: false,
//                     position: 'bottom',
//                     horizontalAlign: 'center',
//                     offsetX: -10,
//                     offsetY: 0
//                 }
//             }
//         }]
//     };

//     var chart = new ApexCharts(pieChartElement, options);
//     chart.render();
// }

// var pieChartElement = document.querySelector("#pieChart");
// if (pieChartElement) {
//     fetch("/api/komposisi-sumber-pendapatan", {
//         method: "GET",
//         headers: {
//             "Accept": "application/json"
//         }
//     })
//     .then(response => response.json())
//     .then(result => {
//         if (result.status === 200 && Array.isArray(result.data)) {
//             var dataPad = result.data.find(d => d.kode === 1);
//             var dataTransfer = result.data.find(d => d.kode === 2);
//             var dataLain = result.data.find(d => d.kode === 3);

//             var series = [
//                 dataPad ? dataPad.realisasi : 0,
//                 dataTransfer ? dataTransfer.realisasi : 0,
//                 dataLain ? dataLain.realisasi : 0
//             ];

//             // Fungsi helper untuk format Rupiah
//             function formatRupiah(value) {
//                 return new Intl.NumberFormat('id-ID', {
//                     style: 'currency',
//                     currency: 'IDR',
//                     minimumFractionDigits: 0,
//                     maximumFractionDigits: 0
//                 }).format(value);
//             }
            
//             var options = {
//                 series: series,
//                 chart: {
//                     height: 264,
//                     type: 'pie',
//                 },
//                 stroke: {
//                     show: false
//                 },
//                 labels: ['PAD', 'Transfer', 'Lain-lain'],
//                 colors: ['#487FFF', "#FF9F29", '#45B369'],
//                 plotOptions: {
//                     pie: {
//                         dataLabels: {
//                             dropShadow: {
//                                 enabled: true,
//                             },
//                             formatter: function(val, opts) {
//                                 return val.toFixed(1) + "%";
//                             }
//                         },
//                     }
//                 },
//                 tooltip: {
//                     y: {
//                         formatter: function(value) {
//                             return formatRupiah(value);
//                         }
//                     }
//                 },
//                 legend: {
//                     position: 'bottom',
//                     horizontalAlign: 'center',
//                     // formatter: function(val, opts) {
//                     //     let value = opts.w.globals.series[opts.seriesIndex];
//                     //     return val + ": " + formatRupiah(value);
//                     // }
//                 },
//                 responsive: [{
//                     breakpoint: 480,
//                     options: {
//                         chart: {
//                             width: 200
//                         },
//                         legend: {
//                             show: false,
//                             position: 'bottom',
//                             horizontalAlign: 'center',
//                             offsetX: -10,
//                             offsetY: 0
//                         }
//                     }
//                 }]
//             };
//             var chart = new ApexCharts(pieChartElement, options);
//             chart.render();
//         }
//     })
//     .catch(err => {
//         console.error('Error:', err);
//         pieChartElement.innerHTML = "<p>Gagal mengambil data</p>";
//     });
// }

function renderPieChart(year = null) {
    // Jika year tidak diberikan, gunakan tahun dari localStorage atau tahun terbaru
    if (year === null || year === undefined) {
        year = localStorage.getItem('selectedYear') || currentYear;
    }
    
    var pieChartElement = document.querySelector("#pieChart");
    if (pieChartElement) {
        fetch("/api/komposisi-sumber-pendapatan", {
            method: "GET",
            headers: {
                "Accept": "application/json"
            }
        })
        .then(response => response.json())
        .then(result => {
            if (result.status === 200 && Array.isArray(result.data)) {
                // Filter data berdasarkan tahun yang diberikan
                const filteredData = result.data.filter(d => d.tahun == year);

                if (filteredData.length === 0) {
                    pieChartElement.innerHTML = "<p class='text-center text-muted'>Data tidak tersedia untuk tahun " + year + "</p>";
                    return;
                }

                var dataPad = filteredData.find(d => d.kode === 1);
                var dataTransfer = filteredData.find(d => d.kode === 2);
                var dataLain = filteredData.find(d => d.kode === 3);

                var series = [
                    dataPad ? dataPad.realisasi : 0,
                    dataTransfer ? dataTransfer.realisasi : 0,
                    dataLain ? dataLain.realisasi : 0
                ];

                function formatRupiah(value) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    }).format(value);
                }
                
                var options = {
                    series: series,
                    chart: {
                        height: 264,
                        type: 'pie',
                    },
                    stroke: {
                        show: false
                    },
                    labels: ['PAD', 'Transfer', 'Lain-lain'],
                    colors: ['#487FFF', "#FF9F29", '#45B369'],
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                dropShadow: {
                                    enabled: true,
                                },
                                formatter: function(val, opts) {
                                    return val.toFixed(1) + "%";
                                }
                            },
                        }
                    },
                    tooltip: {
                        y: {
                            formatter: function(value) {
                                return formatRupiah(value);
                            }
                        }
                    },
                    legend: {
                        position: 'bottom',
                        horizontalAlign: 'center',
                        // formatter: function(val, opts) {
                        //     let value = opts.w.globals.series[opts.seriesIndex];
                        //     return val + ": " + formatRupiah(value);
                        // }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                show: false,
                                position: 'bottom',
                                horizontalAlign: 'center',
                                offsetX: -10,
                                offsetY: 0
                            }
                        }
                    }]
                };
                
                if (window.pieChartInstance) {
                    window.pieChartInstance.destroy();
                }
                
                window.pieChartInstance = new ApexCharts(pieChartElement, options);
                window.pieChartInstance.render();
            }
        })
        .catch(err => {
            console.error('Error:', err);
            pieChartElement.innerHTML = "<p class='text-danger'>Gagal mengambil data</p>";
        });
    }
}

// Panggil saat page load dengan tahun dinamis
renderPieChart();


// ============================ Pie Chart End ==========================


// ============================ Donut Chart Start ==========================
var basicDonutChartElement = document.querySelector("#basicDonutChart");
if (basicDonutChartElement) {
    var options = {
        series: [44, 55, 13, 33, 28, 14],
        chart: {
            height: 264,
            type: 'donut',
        },
        colors: ['#16a34a', '#487fff', '#2563eb', '#dc2626', '#f86624', '#ffc107'],
        dataLabels: {
            enabled: false
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    show: false
                }
            }
        }],
        legend: {
            position: 'right',
            offsetY: 0,
            height: 230,
            show: false
        }
    };

    var chart = new ApexCharts(basicDonutChartElement, options);
    chart.render();
}
// ============================ Donut Chart End ==========================


// ============================ Radar Chart Start ==========================
var radarChartElement = document.querySelector("#radarChart");
if (radarChartElement) {
    var options = {
        series: [{
            name: 'Product 1',
            data: [80, 50, 30, 40, 60, 20, 62, 30, 40, 80],
        }, {
            name: 'Product 2',
            data: [80, 60, 80, 70, 68, 60, 56, 50, 40, 45],
        }],
        colors: ['#FF9F29', '#487FFF'],
        chart: {
            height: 264,
            type: 'radar',
            toolbar: {
                show: false,
            },
            dropShadow: {
                enabled: true,
                blur: 1,
                left: 1,
                top: 1
            }
        },
        stroke: {
            width: 2
        },
        fill: {
            opacity: 0.25
        },
        markers: {
            size: 0
        },
        yaxis: {
            stepSize: 20
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul']
        }
    };

    var chart = new ApexCharts(radarChartElement, options);
    chart.render();
}
// ============================ Radar Chart End ==========================


// ============================ Multiple series Chart Start ==========================
var multipleSeriesChartElement = document.querySelector("#multipleSeriesChart");
if (multipleSeriesChartElement) {
    var options = {
        series: [20, 22, 28, 10],
        chart: {
            type: 'polarArea',
            height: 264,
        },
        labels: ['Product 1', 'Product 2', 'Product 3', 'Product 4'],
        colors: ['#487FFF', '#FF9F29', '#9935FE', '#EF4A00'], 
        stroke: {
            colors: ['#487FFF', '#FF9F29', '#9935FE', '#EF4A00'], 
        },
        fill: {
            opacity: 0.8
        },
        legend: {
            position: 'bottom',
            horizontalAlign: 'center'
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(multipleSeriesChartElement, options);
    chart.render();
}
// ============================ Multiple series Chart End ==========================
