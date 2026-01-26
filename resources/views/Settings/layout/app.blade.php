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


<body class="min-h-screen">

    <x-header />
    <x-slidebar />
    <div class="min-h-screen bg-gray-100 transition-all duration-200
               lg:ml-60"
        style="background-color: {{ $bgColor }}">

        <!-- PAGE CONTENT -->
        <div class="p-4 lg:p-8">

            <x-navbar />

            <div class="pt-4 flex flex-col lg:flex-row gap-4 items-start">

                @if (request()->is('settings*'))
                    <x-menu />
                @endif

                <!-- PAGE BODY -->
                <div class="w-full">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>
    <script>
        const toggleBtn = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>
    @yield('js_content')
</body>

</html>
