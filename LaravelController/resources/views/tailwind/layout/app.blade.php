<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title')</title>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    @vite(["resources/css/app.css", "resources/js/app.js"])
<body>
    <div class="header">
        @yield('header')
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>