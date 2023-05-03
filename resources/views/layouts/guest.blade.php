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
        <link rel="stylesheet" href="assets/styles2.css">
        <link rel="stylesheet" href="assets/style.css">
        <link rel="stylesheet" href="assets/style2.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
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
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                    <p style="font-size: 40px; font-weight: 900">CalmVerse</p>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
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
</html>
