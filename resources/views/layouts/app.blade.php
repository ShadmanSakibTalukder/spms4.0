<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPMS-4.0 || Student Performance Monitoring System</title>
        <!--    BOOSTRAP-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- FONTAWSOME6 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!--    GOOGLE FONTS-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
        <!--    MAIN CSS-->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        @stack('css')
    </head>

        <body>

            @include('layouts.inc.header')

            @yield('content')

        <!-- COPYRIGHT -->
        <section class="copyright-section">
            <div class="container">
                <div class="copyright-content py-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright-left text-center">
                                <p>@copyright-2023 | All Rights Researved by SPMS-4.0</p>
                            </div>
                        </div>
                    
                    </div>

                </div>
            </div>
        </section>
        <!--COPYRIGHT END-->

        <!-- JQUERY GOOGLE HOST -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <!--    BOOSTRAP-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!--feather icon-->
        <script src="https://unpkg.com/feather-icons"></script>

        <script>
            //        MOBILE MENU
            function mobileClick() {
                $("#mobile-menu").toggleClass('mobileAdd');
                $("#mobileOverlay").toggleClass('mobile-overlay');
            }

            //  feather icon
            feather.replace()

        </script>

        @stack('js')


    </body>
</html>