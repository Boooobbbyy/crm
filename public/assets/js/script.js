

Highcharts.chart('container', {
    chart: {
        type: 'spline',
        scrollablePlotArea: {
            minWidth: 600,
            scrollPositionX: 1
        }
    },
    title: {
        text: 'Chart Produk',
        align: 'left'
    },
    subtitle: {
        text: 'Data Chart Produk',
        align: 'left'
    },
    xAxis: {
        type: 'datetime',
        labels: {
            overflow: 'justify'
        }
    },
    yAxis: {
        title: {
            text: 'Produk Masuk'
        },
        minorGridLineWidth: 0,
        gridLineWidth: 0,
        alternateGridColor: null,
        plotBands: [{ // Fresh breeze
            from: 0,
            to: 1,
            color: 'rgba(68, 170, 213, 0.1)',
            label: {
                text: 'Stock Hampir habis',
                style: {
                    color: '#606060'
                }
            }
        }, { // Strong breeze
            from: 1,
            to: 3,
            color: 'rgba(0, 0, 0, 0)',
            label: {
                text: 'Stock Kurang',
                style: {
                    color: '#606060'
                }
            }
        }, { // Fresh breeze
            from: 3,
            to: 5,
            color: 'rgba(68, 170, 213, 0.1)',
            label: {
                text: 'Stock Cukup',
                style: {
                    color: '#606060'
                }
            }
        }, { // Strong breeze
            from: 5,
            to: 7,
            color: 'rgba(0, 0, 0, 0)',
            label: {
                text: 'Stock Lebih',
                style: {
                    color: '#606060'
                }
            }
        }, { // Fresh breeze
            from: 7,
            to: 9,
            color: 'rgba(68, 170, 213, 0.1)',
            label: {
                text: 'Stock Berlimpah',
                style: {
                    color: '#606060'
                }
            }
        }, { // Strong breeze
            from: 9,
            to: 15,
            color: 'rgba(0, 0, 0, 0)',
            label: {
                text: 'Stock Overload',
                style: {
                    color: '#606060'
                }
            }
        },]
    },
    tooltip: {
        valueSuffix: ' Kg'
    },
    plotOptions: {
        spline: {
            lineWidth: 4,
            states: {
                hover: {
                    lineWidth: 5
                }
            },
            marker: {
                enabled: false
            },
            pointInterval: 120000, // 2 menit
            pointStart: Date.UTC(2021, 1, 1, 0, 0, 0)
        }
    },
    series: [{
        name: 'Padi',
        data: [
            [Date.UTC(2021, 1, 1, 0, 0, 0), 7.1], [Date.UTC(2021, 1, 2, 11, 14, 12), 1.1], [Date.UTC(2021, 1, 3, 12, 14, 32), 4.1],
        ]

    }, {
        name: 'Jagung',
        data: [
            [Date.UTC(2021, 1, 1), 7.1], [Date.UTC(2021, 1, 2, 21, 14, 12), 8.2], [Date.UTC(2021, 1, 3, 12, 14, 32), 12.3],
        ]
    }],
    navigation: {
        menuItemStyle: {
            fontSize: '10px'
        }
    }
});