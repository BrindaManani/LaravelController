@extends('tailwind.layout.app')
@extends('tailwind.include.header')
@section('page_title', 'Home')
@section('content')
 <table class="mx-auto mt-12 border border-gray-200 rounded-lg shadow-xl">
    <thead>
        <tr>
            <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase ">Id</th>
            <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase">Name</th>
            <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase">Email</th>
            <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase">Phone Number</th>
            <th scope="col"class="px-6 py-3 font-medium text-gray-500 uppercase">Role</th>
            <th scope="col"class="px-6 py-3 font-medium text-gray-500 uppercase">Status</th>
            <th scope="col"class="px-6 py-3 font-medium text-gray-500 uppercase">Action</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
        @foreach ($users as $user)
            <tr>
                <td class="px-6 py-4 font-medium text-gray-800">{{ $user['id'] ?: "null"   }}</td>
                <td class="px-6 py-4 font-medium text-gray-800">{{ $user['name'] ?: "null"   }}</td>
                <td class="px-6 py-4 text-gray-800">{{ $user['email'] ?: "null"   }}</td>
                <td class="px-6 py-4 text-gray-800">{{ $user['phone'] ?: "null"   }}</td>
                <td class="px-6 py-4 text-gray-800">{{ $user['role'] ?: "null"   }}</td>
                <td class="px-6 py-4 text-gray-800">{{ $user['status'] ?: "null"   }}</td>

                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <a href="{{ route('tailwind.userDetail', $user['id']) }}" class="text-sm/6 font-semibold text-white">
                        <button type="button" class="rounded-md bg-linear-to-r from-cyan-500 to-blue-500 px-3 py-2 text-sm font-semibold text-white">View Details</button>
                    </a>
                    <a href="{{ route('tailwind.userAdd', $user['id']) }}" class="text-sm/6 font-semibold text-white">
                        <button type="button" class="rounded-md bg-linear-to-r from-cyan-500 to-blue-500 px-3 py-2 text-sm font-semibold text-white">Edit</button>
                    </a>
                    <a href="{{ route('tailwind.userDelete', $user['id']) }}" class="text-sm/6 font-semibold text-white">
                        <button type="button" class="rounded-md bg-linear-to-bl from-red-500 to-orange-200 px-3 py-2 text-sm font-semibold text-white">Delete</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection