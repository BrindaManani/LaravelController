{{-- @section('header') --}}
    <header class="border-2 boder-gray-800 bg-white">
        <nav class="flex max-w-auto items-center justify-between p-5">
            <button id="sidebarToggle" class="lg:hidden fixed top-4 left-4 z-50 p-2 rounded-md bg-white shadow">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
            <div class="flex items-center gap-3">
                @if ($site_logo)
                    <img src="{{ asset('storage/' . $site_logo) }}" alt="{{ $site_name }} Logo"
                        class="h-10 w-auto object-contain">
                @endif
                <h2 class="text-2xl font-semibold" style="color: {{ $textColor }}">{{ $site_name }}</h2>
            </div>
            <div class="flex">
                <button
                    class="px-4 py-2 font-semibold text-gray-500 rounded-md bg-white border focus:bg-rose-500 focus:text-white">
                    <i class="fa-solid fa-paintbrush mr-2"></i>Theme
                </button>
                <img src="{{ asset('assets/profile1.png') }}" alt="Profile Picture"
                    class="w-10 h-10 ml-4 rounded-full border-2 border-gray-300 object-cover">
            </div>

        </nav>
    </header>
{{-- @endsection --}}
