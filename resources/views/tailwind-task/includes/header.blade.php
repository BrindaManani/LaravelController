@section('header')
    <header class="border">
        <nav class="flex max-w-auto items-center justify-between p-8 ">
            <div class="flex justify-between">
                <h2 class="text-2xl font-semibold text-red-500">Laravel</h2>
            </div>
            <div class="flex">
                <button
                    class="px-4 py-2 font-semibold text-gray-500 rounded-md bg-white border hover:bg-red-500 hover:text-white">
                    <i class="fa-solid fa-paintbrush mr-2"></i>Theme
                </button>
                <img src="{{ asset('assets/profile1.png') }}" alt="Profile Picture"
                    class="w-10 h-10 ml-4 rounded-full border-2 border-gray-300 object-cover">
            </div>

        </nav>
    </header>
@endsection
