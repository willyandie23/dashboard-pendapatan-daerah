// ============================ Pie Chart Start ==========================
var pieChartElement = document.querySelector("#pieChart");
if (pieChartElement) {
    var options = {
        series: [70, 80, 90],
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
                },
            }
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
                    show: false,
                    position: 'bottom',
                    horizontalAlign: 'center',
                    offsetX: -10,
                    offsetY: 0
                }
            }
        }]
    };

    var chart = new ApexCharts(pieChartElement, options);
    chart.render();
}
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
