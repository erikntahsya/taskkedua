<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="asset" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">


    <!-- Page CSS -->


    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('sweetalert::alert')
            {{-- @if (Auth::user()->role_name == 'admin')
                @include('template.admin.menu')
            @elseif (Auth::user()->role_name == 'assessor')
                @include('template.assessor.menu')
            @elseif (Auth::user()->role_name == 'student')
                @include('template.student.menu')
            @endif --}}
            <!-- Layout navbar -->
            <div class="layout-page">
                {{-- @include('template.admin.menu') --}}
                {{-- @if (Auth::user()->role == 'admin')
                    @include('template.admin.navbar')
                @elseif (Auth::user()->role == 'assessor')
                    @include('template.assessor.navbar')
                @elseif (Auth::user()->role == 'student')
                    @include('template.student.navbar')
                @endif --}}

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                @include('template.admin.menu')
                 @include('template.admin.navbar')

                    <div class="container-xxl flex-grow-1 container-p-y">

                        @yield('container')


                    </div>
                    @include('template.admin.footer')
                    <!-- / Content -->

                    <!-- Footer -->
                    {{-- <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">f
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="https://themeselection.com" target="_blank"
                                    class="footer-link fw-bolder">ThemeSelection</a>
                            </div>
                            <div>
                                <a href="https://themeselection.com/license/" class="footer-link me-4"
                                    target="_blank">License</a>
                                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                                    Themes</a>

                                <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                    target="_blank" class="footer-link me-4">Documentation</a>

                                <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                    target="_blank" class="footer-link me-4">Support</a>
                            </div>
                        </div>
                    </footer> --}}
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="{{ asset('datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
    <script src="{{ asset('datatables/datatables.js') }}"></script>
    <script src="{{ asset('datatables/datatables.min.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#manage-table').DataTable({
                "paging": true,         // Enable pagination
                "searching": true,      // Enable search
                "ordering": true,       // Enable column ordering
                "info": true,           // Show info text
                "lengthChange": true,  // Disable changing page length
                "autoWidth": false,     // Disable auto-width of columns
                "responsive": true      // Make the table responsive
            });
        });
    </script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
