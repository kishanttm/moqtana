<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="description" content="Hasanah :: Commited to safety">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} :: @yield('title')</title>
        
        <!-- Bootstrap -->
        <link href="{{url('/')}}/assets/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

        <!-- Edit Style -->
        <link rel="stylesheet" href="{{url('/')}}/assets/css/styles.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/css/responsive.css">
    </head>
    <body>
        @include('partials.messages')
        <div class="container-fluid login-page h-100">
            @yield('content')
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const toastElList = document.querySelectorAll('.toast');
                const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl,{ delay: 5000 }));
                toastList.forEach(toast => toast.show());
            });
        </script>
        <!-- Bootstrap JS (Popper included) -->
        <script src="{{url('/')}}/assets/plugins/jquery/jquery.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>
