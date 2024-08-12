<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('icons/heritage.png') }}" type="image/x-icon">
    <title>@yield('title', 'Property Listings')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> <!-- Custom Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"> <!-- Animation CSS -->
</head>
<body>
    @include('components.navbar')

    <main class="py-4">
        @yield('content')
    </main>

    @include('components.footer')

    <!-- jQuery -->
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // app.js
        $(document).ready(function() {
            // Hover effect
            $('.navbar-nav .nav-item').hover(
                function() {
                    $(this).addClass('animate__animated animate__pulse');
                },
                function() {
                    $(this).removeClass('animate__animated animate__pulse');
                }
            );

            // Active state
            $('.navbar-nav .nav-link').on('click', function() {
                $('.navbar-nav .nav-link').removeClass('active');
                $(this).addClass('active');
            });
        });

    </script>
</body>
</html>
