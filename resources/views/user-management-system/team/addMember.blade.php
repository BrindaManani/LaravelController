@extends('user-management-system.layout.app')
{{-- @extends('user-management-system.include.header') --}}
@section('page_title', 'Home')
@section('content')


    <form method="POST" action="{{ route('user-management-system.team.createMember', $team->id) }}"
       class="max-w-3xl mx-auto border border-gray-200 rounded-lg p-6 bg-white mt-8 shadow-xl">
        @csrf
        <legend class="text-center text-2xl font-semibold mb-6 text-gray-800">Add Team Members</legend>


        <div class="flex flex-row gap-4 items-start mb-6">
            <div class="flex-1">
                <label for="inputState" class="block text-gray-700 font-bold mb-1 pr-4">Member</label>
                <select id="inputState" name="member"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option value="">Select member</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->first_name }}{{ $user->last_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex justify-center">
            <x-button type="submit">Add Member</x-button>
        </div>
    </form>
@endsection
