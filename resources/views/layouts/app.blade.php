<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">  
    @if(View::hasSection('css'))
        @yield('css')
    @endif

    @vite(['resources/js/app.js'])   
    <script>document.addEventListener("DOMContentLoaded", function () {
            const searchToggle = document.getElementById("search-toggle");
            const searchBar = document.querySelector(".search-bar-container");

            searchToggle.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default link action
                searchBar.style.display = searchBar.style.display === "block" ? "none" : "block";
            });
        });
    </script>
</head>
<body>
    @include('partials.header')

    <main>
        @yield('content') 
    </main>

</body>
</html>
