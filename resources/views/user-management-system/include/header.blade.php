
@section('header')

    <header class="bg-linear-to-r from-cyan-500 to-blue-500 shadow-xl rounded-b-xl">
        <nav class="flex max-w-auto items-center justify-between p-8 ">
            
                <a href="#">
                    <h2 class="text-white text-2xl font-bold ml-24"><i class="fa-solid fa-star"></i> User Management System</h2>
                </a>

            <li class=" lg:flex lg:gap-x-12 ">
                <a href="{{  route('user-management-system.index') }}" class="text-sm/6 font-semibold text-white"><i class="fa-solid fa-home"></i>Home</a>
                <a href="{{  route('user-management-system.userList') }}" class="text-sm/6 font-semibold text-white"><i class="fa-solid fa-clipboard-list"></i>Users</a>
                <a href="{{  route('user-management-system.permission.permissionList') }}" class="text-sm/6 font-semibold text-white"><i class="fa-solid fa-clipboard-list"></i>Permission</a>
                <a href="{{  route('user-management-system.department.deptList') }}" class="text-sm/6 font-semibold text-white"><i class="fa-solid fa-clipboard-list"></i>Department</a>
                <a href="{{  route('user-management-system.post.postList') }}" class="text-sm/6 font-semibold text-white"><i class="fa-solid fa-clipboard-list"></i>Post</a>
                {{-- <a href="{{  route('user-management-system.team.teamList') }}" class="text-sm/6 font-semibold text-white"><i class="fa-solid fa-clipboard-list"></i>Team</a>
                <a href="{{  route('user-management-system.team.addTeam') }}" class="text-sm/6 font-semibold text-white"><i class="fa-solid fa-clipboard-list"></i>Add Team</a> --}}

                  {{-- <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Logout</button></a> --}}
              </li>
        </nav>
    </header>

@endsection