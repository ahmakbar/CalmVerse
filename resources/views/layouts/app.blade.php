<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>Calm Verse</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="assets/style.css">
        <link rel="stylesheet" href="assets/style2.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="preloader">
            <div class="ocean">
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
             </div>
            <div class="preloader-mask">
              <h1 class="preloader-text animate slide-up">Calm</h1>
            </div>
            <div class="preloader-mask">
              <h1 class="preloader-text animate slide-up delay-1">Verse</h1>
            </div>

          </div>
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="assets/main.js"></script>
        <script>
           setTimeout(function() {
              document.querySelector(".preloader").classList.add("preloader-loaded");
              document.querySelector("html, body").style.overflowY = "scroll";
          }, 3600);

          let isReloaded = false;

          window.addEventListener("pageshow", function(event) {
              if (event.persisted && !isReloaded) {
                  isReloaded = true;
                  location.reload();
              }
          });

          </script>
        <script src="assets/try.js"></script>
    </body>
</html>
