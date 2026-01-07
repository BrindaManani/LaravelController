@extends('tailwind.layout.app')
@extends('tailwind.include.header')
@section('page_title', 'Home')
@section('content')

<div class="flex justify-center mx-auto p-4 mt-8">
    <div class="border rounded-xl">
    <div class="flex flex-wrap -mx-3 my-6 ml-5">
        @if($user != null)
        <div class="w-full px-3 mb-6 ">
            <h5 class="text-xl font-bold mb-2">{{ $user['name'] }}
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded ml-3">
                    {{ $user['status'] }}
                </span>
            </h5>
            <p class="text-gray-700">Id: {{ $user['id'] }}</p>
            <p class="text-gray-700">Email: {{ $user['email'] }}</p>
            <p class="text-gray-700">Phone: {{ $user['phone'] }}</p>
            <p class="text-gray-700">Role: <span class="capitalize">{{ $user['role'] }}</span></p>
        </div>
        @endif

        @if(isset($user['profile']) && !empty(array_filter($user['profile'])))
        <div class="w-full px-3">
            <h5 class="text-xl font-bold mb-2">Profile</h5>
            <p class="text-gray-700">Gender: {{ $user['profile']['gender'] }}</p>
            <p class="text-gray-700">Date of birth: {{ $user['profile']['dob'] }}</p>
        </div>
        @endif
    </div>

    <div class="flex flex-wrap -mx-3 mb-6 ml-5">
        @if(isset($user['address']) && !empty(array_filter($user['address'])))
        <div class="w-full px-3 mb-6">
            <h5 class="text-xl font-bold mb-2">Address</h5>
            <p class="text-gray-700">{{ $user['address']['city'] }}, {{ $user['address']['state'] }}</p>
            <p class="text-gray-700">{{ $user['address']['country'] }}</p>
            <p class="text-gray-700">Pincode: {{ $user['address']['pincode'] }}</p>
        </div>
        @endif

        @if(isset($user['permissions']) && !empty(array_filter($user['permissions'])))
        <div class="w-full px-3">
            <h5 class="text-xl font-bold mb-2">Permissions</h5>
            <div class="flex flex-wrap gap-2">
                <ul>
                @foreach($user['permissions'] as $permission)
                        <li>{{ $permission }}</li>
                @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
</div>


@endsection