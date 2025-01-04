<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="shortcut icon" type="image/png" href="" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/ProtectPlusLogo.png" width="180" alt="" />
                    </a>

                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <nav class="sidebar-nav scroll-sidebar {{ request()->routeIs('dashboard') ? 'Selected' : '' }}"
                    data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Menu</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="/dashboard" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/EvacuationAreas" class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="hide-menu">Evacuation Areas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/ApproveLectures" class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-check"></i>
                                </span>
                                <span class="hide-menu">Approve Lectures</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="Feedbacks" class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-message-circle"></i>
                                </span>
                                <span class="hide-menu">Feedbacks</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="GenerateCertificates" class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-certificate"></i>
                                </span>
                                <span class="hide-menu">Generate Certificates</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="MonitorHazard" class="sidebar-link" href=""
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-map"></i>
                                </span>
                                <span class="hide-menu">Monitor Hazard Areas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="Employee" class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Employees</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="EmergencyHotline" class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-phone"></i>
                                </span>
                                <span class="hide-menu">Emergency Hotlines</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="HazardAreas" class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-alert-triangle"></i>
                                </span>
                                <span class="hide-menu">Hazard Prone Areas</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Reports</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-analytics"></i>
                                </span>
                                <span class="hide-menu">Report 1</span>
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
        </aside>
        <div class="body-wrapper">
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/profile/user-1.jpg" alt="" width="35"
                                        height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="/SignIn.php"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="container-fluid">
                @yield('content')
            </div>

        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    @stack('scripts')
    <script>
        $(document).ready(function() {
            // Dropdown toggle on click
            $('#drop2').on('click', function(e) {
                e.stopPropagation();
                const $dropdownMenu = $('.dropdown-menu');

                if ($dropdownMenu.hasClass('show')) {
                    $dropdownMenu.removeClass('show').removeAttr('data-bs-popper');
                    $(this).attr('aria-expanded', 'false');
                } else {
                    $dropdownMenu.addClass('show').attr('data-bs-popper', 'static');
                    $(this).attr('aria-expanded', 'true');
                }
            });

            // Hide the dropdown when clicking outside
            $(document).on('click', function(e) {
                const $dropdownMenu = $('.dropdown-menu');

                if (!$dropdownMenu.is(e.target) && $dropdownMenu.has(e.target).length === 0) {
                    $dropdownMenu.removeClass('show').removeAttr('data-bs-popper');
                    $('#drop2').attr('aria-expanded', 'false');
                }
            });
        });
    </script>
</body>

</html>
