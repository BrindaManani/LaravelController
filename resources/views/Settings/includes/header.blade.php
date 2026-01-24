@section('header')
    <header class="border-2 boder-gray-800 bg-white">
        <nav class="flex max-w-auto items-center justify-between p-5">
            <div class="flex items-center gap-3">
                @if ($settings->site_logo)
                    <img src="{{ asset('storage/' . $settings->site_logo) }}" alt="{{ $settings->site_name }} Logo"
                        class="h-10 w-auto object-contain">
                @endif
                <h2 class="text-2xl font-semibold" style="color: {{ $textColor }}">{{ $settings->site_name }}</h2>
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
@endsection
