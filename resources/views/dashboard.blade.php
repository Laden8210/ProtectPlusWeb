@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Hazard Overview</h5>
                        </div>

                    </div>
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Hazard Breakup</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3">1,000 Hazards</h4>

                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-center">
                                        <div id="breakup"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row alig n-items-start">
                                <div class="col-8">
                                    <h5 class="card-title mb-9 fw-semibold"> Monthly Total Feedbacks </h5>
                                    <h4 class="fw-semibold mb-3">820</h4>
                                    <div class="d-flex align-items-center pb-1">
                                        <span
                                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-down-right text-danger"></i>
                                        </span>
                                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                        <p class="fs-3 mb-0">last month</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-end">
                                        <div
                                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-message fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="feedbacks"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Latest Feedbacks</h5>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">User Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Feedback</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Date</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Time</h6>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">John Doe</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">Heavy rainfall in Our Area</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">21-12-2024</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">6:24 Pm</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">Jane Smith</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">Flooding near the riverbank</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">22-12-2024</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">7:10 AM</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">Michael Johnson</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">Landslide on Mountain Road</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">23-12-2024</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">3:45 PM</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">Alice Cooper</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">Strong winds causing damage</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">24-12-2024</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">10:00 AM</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">David Williams</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">Tornado spotted in the area</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">25-12-2024</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">5:15 PM</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">Emily Brown</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">Hailstorm reported in the city center</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">26-12-2024</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">1:30 PM</p>
                                    </td>
                                </tr>
                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(function() {
            var chart = {
                series: [{
                        name: "Very Hign",
                        data: [30, 45, 50, 40, 60]
                    },
                    {
                        name: "High",
                        data: [10, 20, 25, 15, 30]
                    },
                    {
                        name: "Moderate",
                        data: [10, 20, 25, 15, 30]
                    },
                    {
                        name: "Low",
                        data: [10, 20, 25, 15, 30]
                    },
                ],

                chart: {
                    type: "bar",
                    height: 345,
                    offsetX: -15,
                    toolbar: {
                        show: true
                    },
                    foreColor: "#adb0bb",
                    fontFamily: 'inherit',
                    sparkline: {
                        enabled: false
                    },
                },

                colors: ["#8B0000", "#FF0000", "#FFA500", "#008000"],

                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "35%",
                        borderRadius: [6],
                        borderRadiusApplication: 'end',
                        borderRadiusWhenStacked: 'all'
                    },
                },
                markers: {
                    size: 0
                },

                dataLabels: {
                    enabled: false,
                },

                legend: {
                    show: true, // Show the legend
                    position: 'top', // Position the legend at the top
                    horizontalAlign: 'center', // Align the legend horizontally in the center
                    fontSize: '14px',
                    labels: {
                        colors: '#adb0bb',
                    },
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 5, // Rounded markers
                    },
                    itemMargin: {
                        horizontal: 10,
                        vertical: 5
                    },
                },

                grid: {
                    borderColor: "rgba(0,0,0,0.1)",
                    strokeDashArray: 3,
                    xaxis: {
                        lines: {
                            show: false,
                        },
                    },
                },

                xaxis: {
                    type: "category",
                    categories: ["Earthquake", "Flood", "Storm Surge", "Fire", "Landslide", "Typhon",
                        "5 PM"
                    ],
                    labels: {
                        style: {
                            cssClass: "grey--text lighten-2--text fill-color"
                        },
                    },
                },

                yaxis: {
                    show: true,
                    min: 0,
                    max: 70,
                    tickAmount: 7,
                    labels: {
                        style: {
                            cssClass: "grey--text lighten-2--text fill-color",
                        },
                    },
                },
                stroke: {
                    show: true,
                    width: 3,
                    lineCap: "butt",
                    colors: ["transparent"],
                },

                tooltip: {
                    theme: "light"
                },

                responsive: [{
                    breakpoint: 600,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 3,
                            }
                        },
                    }
                }]
            };
            var chart = new ApexCharts(document.querySelector("#chart"), chart);
            chart.render();


            var breakup = {
                color: "#adb5bd",
                series: [10, 30, 20, 15],
                labels: ["Very High", "High", "Moderate", "Low"],
                chart: {
                    width: 180,
                    type: "donut",
                    fontFamily: "'Plus Jakarta Sans', sans-serif",
                    foreColor: "#adb0bb",
                },
                plotOptions: {
                    pie: {
                        startAngle: 0,
                        endAngle: 360,
                        donut: {
                            size: '60%',
                        },
                    },
                },
                stroke: {
                    show: false,
                },

                dataLabels: {
                    enabled: false,
                },

                legend: {
                    show: false,
                },
                colors: ["#8B0000", "#FF0000", "#FFA500", "#008000"],

                responsive: [{
                    breakpoint: 991,
                    options: {
                        chart: {
                            width: 150,
                        },
                    },
                }, ],
                tooltip: {
                    theme: "dark",
                    fillSeriesColor: false,
                },
            };


            var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
            chart.render();

            var attendees = {
                chart: {
                    id: "sparkline3",
                    type: "area",
                    height: 60,
                    sparkline: {
                        enabled: true,
                    },
                    group: "sparklines",
                    fontFamily: "Plus Jakarta Sans', sans-serif",
                    foreColor: "#adb0bb",
                },
                series: [{
                    name: "Monthly Feedbacks",
                    color: "#49BEFF",
                    data: [320, 450, 400, 500, 470, 520, 600, 580, 610, 560, 490,
                        530
                    ] // Monthly attendance data
                }, ],
                stroke: {
                    curve: "smooth",
                    width: 2,
                },
                fill: {
                    colors: ["#f3feff"],
                    type: "solid",
                    opacity: 0.05,
                },
                markers: {
                    size: 0,
                },
                tooltip: {
                    theme: "dark",
                    fixed: {
                        enabled: true,
                        position: "right",
                    },
                    x: {
                        show: true,
                        formatter: function(value, {
                            dataPointIndex
                        }) {
                            // Array of month labels
                            const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                                "Oct", "Nov", "Dec"
                            ];
                            // Return the month corresponding to the data point
                            return months[dataPointIndex];
                        }
                    },
                    y: {
                        title: {
                            formatter: function() {
                                return "Feedbacks";
                            }
                        }
                    }
                },
            };

            new ApexCharts(document.querySelector("#feedbacks"), attendees).render();
        });


       

        $("#very-high-marker").css("background-color", getMarkerColor("Severe"));
        $("#high-marker").css("background-color", getMarkerColor("High"));
        $("#moderate-marker").css("background-color", getMarkerColor("Moderate"));
        $("#low-marker").css("background-color", getMarkerColor("Low"));

    </script>
@endpush
