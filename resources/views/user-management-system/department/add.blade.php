@extends('user-management-system.layout.app')
{{-- @extends('user-management-system.include.header') --}}
@section('page_title', 'Home')
@section('content')


    <form method="POST" action="{{ route('user-management-system.department.createDept', [$department['id'] ?? '']) }}"
       class="max-w-3xl mx-auto border border-gray-200 rounded-lg p-6 bg-white mt-8 shadow-xl">
        @csrf
        <legend class="text-center text-2xl font-semibold mb-6 text-gray-800">Add Department Data</legend>


        <div class="flex flex-row gap-4 items-start mb-6">
            <div class="flex-1">
                <label for="dept_name" class="block text-gray-700 font-bold mb-1">Department Name<span class="text-red-500">
                        *</span></label>
                <input type="text" name="dept_name" id="dept_name" value="{{ $department->department ?? ''}}" placeholder=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                @error('dept_name')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="flex justify-center">
            <x-button type="submit">Add Department</x-button>
        </div>
    </form>
@endsection
