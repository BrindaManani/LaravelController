@extends('user-management-system.layout.app')
@section('content')
    <form method="post" action="{{ route('user-management-system.register') }}" class="mt-10 max-w-xl mx-auto border border-gray-200 rounded-lg p-6 bg-white mt-8 shadow-xl">
        @csrf
        <legend class="text-xl font-bold text-center mb-6">Register</legend>
        <div class="grid grid-rows-2">
            <div class="">
                <label for="name" class="block text-gray-700 font-bold m-3">First Name<span class="text-red-500">
                        *</span></label>
                <input type="text" name="first_name" id="first_name" value="" placeholder="Brinda"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3">
                @error('first_name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="">
                <label for="name" class="block text-gray-700 font-bold m-3">last Name<span class="text-red-500">
                        *</span></label>
                <input type="text" name="last_name" id="last_name" value="" placeholder="Manani"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3">
                @error('last_name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="">
                <label for="name" class="block text-gray-700 font-bold m-3">Email<span class="text-red-500">
                        *</span></label>
                <input type="text" name="email" id="email" value="" placeholder="brinda@gmail.com"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="">
                <label for="name" class="block text-gray-700 font-bold m-3">Password<span class="text-red-500">
                        *</span> <p class="text-sm">(Must contains capital letters, Small letters and numeric value)</p></label>
                <input type="password" name="password" id="password" value="" placeholder="********"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3">
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="">
                <label for="name" class="block text-gray-700 font-bold m-3">Confirm Password<span class="text-red-500">
                        *</span> <p class="text-sm">(Must be same as password field)</p></label>
                <input type="password" name="password_confirmation" id="password_confirmation" value="" placeholder="********"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3">
                @error('password_confirmation')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-row mx-auto">
                <x-button>Register</x-button>
            </div>
        </div>
    </form>
@endsection