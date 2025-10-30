// ================================ Column Charts Chart Start ================================ 
var columnChartElement = document.querySelector("#columnChart");
if (columnChartElement) {
    var options = {
        series: [{
            name: 'Target',
            data: [20000, 16000, 14000, 25000, 45000, 18000, 28000, 11000, 26000, 48000, 18000, 22000]
        },{
            name: 'Realisasi',
            data: [15000, 18000, 19000, 20000, 35000, 20000, 18000, 13000, 18000, 38000, 14000, 16000]
        }],
        colors: ['#487FFF', '#FF9F29'],
        labels: ['Active', 'New', 'Total'],
        legend: {
            show: false 
        },
        chart: {
            type: 'bar',
            height: 264,
            toolbar: {
                show: false
            },
        },
        grid: {
            show: true,
            borderColor: '#D1D5DB',
            strokeDashArray: 4,
            position: 'back',
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                columnWidth: 10,
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return (value / 1000).toFixed(0) + 'Jt';
                }
            }
        },
        tooltip: {
            y: {
                formatter: function (value) {
                    return value / 1000 + 'Juta';
                }
            }
        },
        fill: {
            opacity: 1,
            width: 18,
        },
    };

    var chart = new ApexCharts(columnChartElement, options);
    chart.render();
}
// ================================ Column Charts Chart End ================================ 



// ================================ Column with Group Label chart Start ================================ 
var columnGroupBarChartElement = document.querySelector("#columnGroupBarChart");
if (columnGroupBarChartElement) {
    var options = {
        series: [{
            name: "Sales",
            data: [{
                x: 'Jan',
                y: 85000,
            }, {
                x: 'Feb',
                y: 70000,
            }, {
                x: 'Mar',
                y: 40000,
            }, {
                x: 'Apr',
                y: 50000,
            }, {
                x: 'May',
                y: 60000,
            }, {
                x: 'Jun',
                y: 50000,
            }, {
                x: 'Jul',
                y: 40000,
            }, {
                x: 'Aug',
                y: 50000,
            }, {
                x: 'Sep',
                y: 40000,
            }, {
                x: 'Oct',
                y: 60000,
            }, {
                x: 'Nov',
                y: 30000,
            }, {
                x: 'Dec',
                y: 50000,
            }]
        }],
        chart: {
            type: 'bar',
            height: 264,
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                borderRadius: 8,
                columnWidth: '23%',
                borderRadiusApplication: 'end',
                borderRadiusWhenStacked: 'last',
                endingShape: 'rounded',
            }
        },
        dataLabels: {
            enabled: false
        },
        fill: {
            type: 'gradient',
            colors: ['#487FFF'],
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#487FFF'],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100],
            },
        },
        grid: {
            show: true,
            borderColor: '#D1D5DB',
            strokeDashArray: 4,
            position: 'back',
        },
        xaxis: {
            type: 'category',
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return (value / 1000).toFixed(0) + 'k';
                }
            }
        },
        tooltip: {
            y: {
                formatter: function (value) {
                    return value / 1000 + 'k';
                }
            }
        }
    };

    var chart = new ApexCharts(columnGroupBarChartElement, options);
    chart.render();
}
// ================================ Column with Group Label chart End ================================ 


  
// ================================ Group Column Bar chart Start ================================ 
var groupColumnBarChartElement = document.querySelector("#groupColumnBarChart");
if (groupColumnBarChartElement) {
    var options = {
        series: [{
            name: 'PRODUCT A',
            data: [14, 18, 24, 35, 14, 22, 43, 14, 22, 43, 14, 18]
        }, {
            name: 'PRODUCT B',
            data: [13, 23, 20, 25, 13, 13, 27, 13, 13, 27, 13, 23]
        }, {
            name: 'PRODUCT C',
            data: [11, 17, 20, 25, 11, 21, 14, 11, 21, 14, 11, 17]
        }, {
            name: 'PRODUCT D',
            data: [21, 15, 20, 25, 21, 22, 8, 10, 22, 8, 21, 15]
        }],
        chart: {
            type: 'bar',
            height: 264,
            stacked: true,
            toolbar: {
                show: false
            },
            zoom: {
                enabled: true
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    show: false,
                    position: 'bottom',
                    offsetX: -10,
                    offsetY: 0
                }
            }
        }],
        colors: ['#487FFF', '#FF9F29', '#48AB69', '#45B369'],
        plotOptions: {
            bar: {
                horizontal: false,
                borderRadius: 4,
                columnWidth: 10,
                borderRadiusApplication: 'end',
                borderRadiusWhenStacked: 'last',
                dataLabels: {
                    total: {
                        enabled: false,
                        style: {
                            fontSize: '13px',
                            fontWeight: 900
                        }
                    }
                }
            },
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            type: 'category',
            categories: ['01', '03', '05', '07', '10', '13', '16', '19', '21', '23', '25', '27'],
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return (value / 1000).toFixed(0) + 'k';
                }
            }
        },
        tooltip: {
            y: {
                formatter: function (value) {
                    return value / 1000 + 'k';
                }
            }
        },
        legend: {
            position: 'right',
            offsetY: 40,
            show: false
        },
        fill: {
            opacity: 1
        }
    };

    var chart = new ApexCharts(groupColumnBarChartElement, options);
    chart.render();
}
// ================================ Group Column Bar chart End ================================ 


// ================================ Bars Up Down (Earning Statistics) chart Start ================================ 
var upDownBarchartElement = document.querySelector("#upDownBarchart");
if (upDownBarchartElement) {
    var options = {
        series: [
            {
                name: "Income",
                data: [44, 42, 57, 86, 58, 55, 70, 44, 42, 57, 86, 58, 55, 70],
            },
            {
                name: "Expenses",
                data: [-34, -22, -37, -56, -21, -35, -60, -34, -22, -37, -56, -21, -35, -60],
            },
        ],
        chart: {
            stacked: true,
            type: "bar",
            height: 263,
            fontFamily: "Poppins, sans-serif",
            toolbar: { 
                show: false,
            },
        }, 
        colors: ["#487FFF", "#EF4A00"],
        plotOptions: {
            bar: {
                columnWidth: "8",
                borderRadius: [2],
                borderRadiusWhenStacked: "all",
            },
        },
        stroke: {
            width: [5, 5]
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: true,
            position: "top",
        },
        yaxis: {
            show: false,
            title: {
                text: undefined,
            },
            labels: {
                formatter: function (y) {
                    return y.toFixed(0) + "";
                },
            },
        },
        xaxis: {
            show: false,
            categories: [
                "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun", 
                "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"
            ],
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: true,
                style: {
                    colors: "#d4d7d9",
                    fontSize: "10px",
                    fontWeight: 500,
                },
            },
        },
        tooltip: {
            enabled: true,
            shared: true,
            intersect: false,
            theme: "dark",
            x: {
                show: false,
            },
        },
    };
    
    var chart = new ApexCharts(upDownBarchartElement, options);
    chart.render();
}
// ================================ Bars Up Down (Earning Statistics) chart End ================================
