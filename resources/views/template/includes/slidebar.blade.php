@section('slidebar')
    <div class="fixed w-48 left-0 h-full border">
        <div class="flex flex-col mt-4">
            
            <ul class="space-y-4 px-2">
                <li class="mb-5 ml-5"><i class="fa-regular fa-house mr-2"></i><a href="{{  route('dashboard') }}">Dashboard</li>
                <li>SETTINGS
                    <ul class="mt-2 space-y-2 pl-4">
                    <li>
                        <a href="{{  route('general-settings') }}" class="block px-2 py-1 text-gray-500 focus:bg-rose-200 focus:text-rose-500 focus:border-l-4 focus:border-rose-500 rounded">
                            Settings
                        </a>
                    </li>
                </li>
            </ul>
        </div>
    </div>
@endsection
