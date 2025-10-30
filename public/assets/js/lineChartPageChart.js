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
function createLineChart(chartId, chartColor) {
    var chartElement = document.querySelector(`#${chartId}`);
    if (chartElement) {
        var options = {
            series: [
                {
                    name: 'Target',
                    data: [800000, 150000, 90000, 200000, 100000, 330000, 130000, 220000, 80000, 170000, 100000, 150000],
                },
                {
                    name: 'Realisasi',
                    data: [80000, 240000, 180000, 400000, 180000, 480000, 220000, 380000, 180000, 300000, 200000, 280000],
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
                colors: ["#FF9F29", chartColor],
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
                colors: ["#FF9F29", chartColor],
                strokeWidth: 3,
                size: 0,
                hover: {
                    size: 10
                }
            },
            xaxis: {
                categories: [`Jan`, `Feb`, `Mar`, `Apr`, `Mei`, `Jun`, `Jul`, `Agu`, `Sep`, `Okt`, `Nov`, `Des`],
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
                max: 1000000,
                tickAmount: 4,
                labels: {
                    formatter: function (value) {
                        return value.toLocaleString();
                    },
                    style: {
                        fontSize: "10px"
                    }
                },
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
            legend: {
                show: false
            }
        };

        var chart = new ApexCharts(chartElement, options);
        chart.render();
    }
}
createLineChart('doubleLineChart', '#487fff');
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
