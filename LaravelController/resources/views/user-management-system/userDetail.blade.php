@extends('user-management-system.layout.app')
@extends('user-management-system.include.header')
@section('page_title', 'Home')
@section('content')

<div class="flex justify-center mx-auto p-4 mt-8">
    <div class="max-w-2xl mx-auto border border-gray-200 rounded-lg p-6 bg-white mt-8 shadow-xl">
        <div class="flex justify-center mb-6 h-14">
            <img src="{{ asset('/storage/' . $user['avatar']) ?? asset('assets/img/profile.png') }}" 
                alt="Profile Picture"
                class="w-12 h-12 rounded-full border-2 border-gray-300 object-cover">
        </div>

    <div class="flex flex-wrap -mx-3 my-6 ml-5">
        @if($user != null)
        <div class="w-full px-3 mb-6 ">
            <h5 class="text-xl font-bold mb-2">{{ $user['first_name'] }} {{ $user['last_name'] }}
                <span class="text-xs font-semibold px-2.5 py-0.5 rounded ml-3
                    {{ (isset($user['status']) && $user['status'] == 'active') ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800' }}">
                    {{ $user['status'] ?? 'Inactive' }}
                </span>

            </h5>
            <p class="text-gray-700">Id: {{ $user['id'] }}</p>
            <p class="text-gray-700">Email: {{ $user['email'] }}</p>
            <p class="text-gray-700">Phone: {{ $user['phone'] }}</p>
            <p class="text-gray-700">Department: {{ $user->user_department?->department?->department ?? 'No Department' }}</p>
            <p class="text-gray-700">Role: <span class="capitalize">{{ $user['role'] }}</span></p>
        </div>
        @endif

        <div class="w-full px-3">
            <h5 class="text-xl font-bold mb-2">Profile</h5>
            <p class="text-gray-700">Gender: {{ $user['gender'] ?? null }}</p>
            <p class="text-gray-700">Date of birth: {{ $user['dob'] ?? null}}</p>
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6 ml-5">
        <div class="w-full px-3 mb-6">
            <h5 class="text-xl font-bold mb-2">Address detail</h5>
            <p class="text-gray-700">Address:{{  $user['address'] }}</p>
            <p class="text-gray-700">City: {{ $user['city'] ?? null}}</p>
            <p class="text-gray-700">State: {{ $user['state'] }}</p>
            <p class="text-gray-700">Country: {{ $user['country'] }}</p>
            <p class="text-gray-700">Pincode: {{ $user['pincode'] ?? null}}</p>
        </div>
        @if($user->permission !== null)
        <div class="w-full px-3">
            <h5 class="text-xl font-bold mb-2">Permissions</h5>
            <div class="flex flex-wrap gap-2">
                <ul>
                @foreach($user->permissions as $permission)
                    <li class="">{{ $permission->permission }}</li>
                @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
</div>


@endsection