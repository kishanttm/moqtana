<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }} :: @yield('title')</title>

        <!-- Bootstrap 5.3 CSS -->
        <link rel="stylesheet" href="{{url('/')}}/assets/plugins/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/plugins/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/plugins/datatables/dataTables.responsive.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/plugins/dropify/dropify.min.css">

        <!-- Project CSS -->
        <link rel="stylesheet" href="{{url('/')}}/assets/css/styles.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/css/responsive.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/css/datatable.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/css/dropify.css">


    </head>
    <body class="font-sans antialiased">
        @include('partials.messages')
        <div class="app">
            @include('layouts.sidebar')
            <main class="d-flex flex-column z-0 px-xl-4 px-lg-3 px-2 pb-4">
                @include('layouts.header')
                <div class="container-fluid px-0">
                    @yield('content')
                </div>
            </main>
        </div>
        @yield('content-model')
        <script src="{{url('/')}}/assets/plugins/jquery/jquery.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/bootstrap/bootstrap.bundle.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatables/dataTables.responsive.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @stack('script')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
                const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
                
                const toastElList = document.querySelectorAll('.toast');
                const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl,{ delay: 5000 }));
                toastList.forEach(toast => toast.show());
            });
        </script>
    </body>
</html>
