@extends('user-management-system.layout.app')
{{-- @extends('user-management-system.include.header') --}}
@section('page_title', 'Home')
@section('content')
    @if (session('success') || session('alert'))
        <x-alert class="text-center bg-green-200 text-xl text-green-700">
            {{ session('success') }}
        </x-alert>
        <x-alert class="text-center bg-red-200 text-xl text-red-700">
            {{ session('alert') }}
        </x-alert>
        <script>
            setTimeout(() => {
                const msg = document.getElementById('success-message');
                if (msg) {
                    msg.remove();
                }
            }, 2000);
        </script>
    @endif
    <table id="dept-list-table" class="mx-auto mt-12 mb-6 border border-gray-200 rounded-lg shadow-xl">
        <caption class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div class="text-left">
                    <h2 class="text-xl font-bold text-gray-800">Department</h2>
                </div>

                @if (session('can_write'))
                    <a href="{{ route('user-management-system.department.addDept') }}" class="whitespace-nowrap">
                        <x-button>
                            <i class="fa-solid fa-plus mr-2"></i> Add Department
                        </x-button>
                    </a>
                @endif
            </div>
        </caption>
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase ">Id</th>
                <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase">Department Name</th>
                <th scope="col"class="px-6 py-3 font-medium text-gray-500 uppercase">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($departments as $department)
                <tr>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $department['id'] ?: 'null' }}</td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $department['department'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                        <a href="{{ route('user-management-system.department.memberList', $department['id']) }}"
                            class="text-sm/6 font-semibold text-white">
                            <x-button type="submit"><i class="fa-solid fa-eye"></i> View members</x-button>
                        </a>

                        @if (session('can_write'))
                            <a href="{{ route('user-management-system.department.addMember', $department['id']) }}"
                                class="text-sm/6 font-semibold text-white">
                                <x-button type="submit"><i class="fa-solid fa-pen-to-square"></i> Add Member</x-button>
                            </a>
                            <a href="{{ route('user-management-system.department.addDept', $department['id']) }}"
                                class="text-sm/6 font-semibold text-white">
                                <x-button type="submit"><i class="fa-solid fa-pen-to-square"></i> Edit</x-button>
                            </a>
                            @if (session('can_delete'))
                                <button type="submit" id="popup-model"
                                    class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white"
                                    onclick="document.getElementById('deleteModal-{{ $department['id'] }}').classList.remove('hidden')"><i
                                        class="fa-solid fa-xmark"></i> Delete
                                </button>

                                <div id="deleteModal-{{ $department['id'] }}"
                                    class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50">

                                    <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6 text-left">
                                        <h3 class="text-lg font-semibold text-gray-900">
                                            Delete department
                                        </h3>

                                        <p class="mt-2 text-sm text-gray-600">
                                            Are you sure you want to delete this data?
                                        </p>

                                        <div class="mt-6 flex justify-end gap-3">
                                            <button type="button"
                                                class="shadow  bg-cyan-500 text-white font-bold py-2 px-4 rounded"
                                                onclick="document.getElementById('deleteModal-{{ $department['id'] }}').classList.add('hidden')">Cancel
                                            </button>

                                            <a
                                                href="{{ route('user-management-system.department.deptDelete', ['id' => $department['id']]) }}">
                                                <button type="button"
                                                    class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white">delete</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-center">
        {{ $departments->links('pagination::tailwind') }}
    </div>
@endsection
@section('js_content')
    <script>
        window.addEventListener('load', (event) => {
            function popupBox() {
                console.log("dc");
                document.getElementById("dept-list-table").innerHTML = "<x-popupbox />";
            }
        })
    </script>
@endsection
