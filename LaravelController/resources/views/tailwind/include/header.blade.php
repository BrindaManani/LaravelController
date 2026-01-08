
@section('header')

    <header class="bg-linear-to-r from-cyan-500 to-blue-500 shadow-xl rounded-b-xl">
        <nav class="flex max-w-7xl items-center justify-around p-8 ">
            
                <a href="#">
                    <h2 class="text-white text-2xl font-bold ml-24"><i class="fa-solid fa-star"></i> User Management System</h2>
                </a>

            <li class=" lg:flex lg:gap-x-12 ">
                <a href="{{  route('tailwind.index') }}" class="text-sm/6 font-semibold text-white"><i class="fa-solid fa-home"></i>Home</a>
                <a href="{{  route('tailwind.userList') }}" class="text-sm/6 font-semibold text-white"><i class="fa-solid fa-clipboard-list"></i>Users</a>
                <a href="{{  route('tailwind.userAdd') }}" class="text-sm/6 font-semibold text-white"><i class="fa-solid fa-user"></i>Add User</a>
                  {{-- <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Logout</button></a> --}}
              </li>
        </nav>
    </header>

@endsection