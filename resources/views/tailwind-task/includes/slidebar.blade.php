@section('slidebar')
    <div class="fixed w-48 left-0 h-full border">
        <div class="flex flex-col mt-4">
            {{-- <i class="fa-regular fa-house"></i> --}}
            <ul class="space-y-4 px-2">
                <li class="mb-5">Dashboard</li>
                <li>SETTINGS
                    <ul class="mt-2 space-y-2 pl-4">
                    <li>
                        <a href="#" class="block px-2 py-1 text-gray-500 hover:bg-red-200 hover:border-red-500 rounded">
                            Settings
                        </a>
                    </li>
                </li>
            </ul>
        </div>
    </div>
@endsection
