@extends('user-management-system.layout.app')
@extends('user-management-system.include.header')
@section('page_title', 'Home')
@section('content')


    <form method="POST" action="{{ route('user-management-system.team.createTeam') }}"
       class="max-w-3xl mx-auto border border-gray-200 rounded-lg p-6 bg-white mt-8 shadow-xl">
        @csrf
        <legend class="text-center text-2xl font-semibold mb-6 text-gray-800">Add Team Data</legend>


        <div class="flex flex-row gap-4 items-start mb-6">
            <div class="flex-1">
                <label for="team_name" class="block text-gray-700 font-bold mb-1">Team Name<span class="text-red-500">
                        *</span></label>
                <input type="text" name="team_name" id="team_name" placeholder=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                @error('team_name')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="flex justify-center">
            <x-button type="submit">Add Team</x-button>
        </div>
    </form>
@endsection
