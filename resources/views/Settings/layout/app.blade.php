<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title')</title>
    <link rel="icon" type="image/x-icon" href="#">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])


<body>

    <div class="header sticky top-0 z-20">
        @yield('header')
    </div>
    <div>
        <x-slidebar></x-slidebar>
    </div>
    <div class="ml-64 mt-8 mr-8">
        @if(request()->is('settings*') )
        <x-navbar></x-navbar>
        @endif
        <div class="pt-4 flex flex-row gap-4 items-start">
            @if(request()->is('settings*') )
            <x-menu></x-menu>
            @endif
            @yield('content')
        </div>
    </div>

    @yield('js_content')
</body>

</html>
