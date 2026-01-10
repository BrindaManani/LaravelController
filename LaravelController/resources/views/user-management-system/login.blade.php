@extends('user-management-system.layout.app')
@section('content')
    <form method="post" action="{{ route('user-management-system.login') }}"
        class="mt-50 max-w-xl mx-auto border border-gray-200 rounded-lg p-6 bg-white mt-8 shadow-xl">
        @csrf
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <legend class="text-xl font-bold text-center mb-6">Login</legend>
        <div class="grid grid-rows-2">
            <div class="">
                <label for="name" class="block text-gray-700 font-bold m-3">Email<span class="text-red-500">
                        *</span></label>
                <input type="text" name="email" id="email" value="" placeholder="Enter your registered email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="">
                <label for="name" class="block text-gray-700 font-bold m-3">Password<span class="text-red-500">
                        *</span></label>
                <input type="password" name="password" id="password" value=""
                    placeholder="Enter your registered password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3">
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-row mx-auto">
                <x-button>Register</x-button>
            </div>
        </div>
    </form>
@endsection
