@extends('Settings.layout.app')
{{-- @extends('user-management-system.include.header') --}}
@section('page_title', 'Home')
@section('content')
    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-6 ">
        <div class="bg-white border-2 border-gray-200  rounded-xl p-4">
            <x-body-card>
                <x-slot name="title">
                    <div class="flex justify-between items-center">
                        <span>Department</span>

                        @if (session('can_write'))
                            <a href="{{ route('user-management-system.team.addTeam', [$team['id'] ?? '']) }}">
                                <x-button class="text-medium">
                                    <i class="fa-solid fa-plus mr-2"></i>
                                </x-button>
                            </a>
                        @endif
                    </div>
                </x-slot>
            </x-body-card>
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
            <div class="overflow-x-auto">
                <table id="dept-list-table" class="w-full text-center">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase ">Id</th>
                            <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase">Department Name</th>
                            <th scope="col"class="px-6 py-3 font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @if ($departments->isEmpty())
                            <tr>
                                <td colspan="3" class="px-4 py-2 text-gray-500">No members found.</td>
                            </tr>
                        @endif
                        @foreach ($departments as $department)
                            <tr class="text-center">
                                <td class="px-6 py-4 font-medium text-gray-800">{{ $department['id'] ?: 'null' }}</td>
                                <td class="px-6 py-4 font-medium text-gray-800">{{ $department['department'] }}</td>
                                <td class="px-6 py-4 text-end text-sm font-medium">
                                    <a href="{{ route('user-management-system.department.deptList', $department['id']) }}"
                                        class="text-sm/6 font-semibold text-white">
                                        <x-button type="submit"><i class="fa-solid fa-eye"></i></x-button>
                                    </a>

                                    <a href="{{ route('user-management-system.department.addDept', $department['id']) }}"
                                        class="text-sm/6 font-semibold text-white">
                                        <x-button type="submit"><i class="fa-solid fa-pen-to-square"></i> </x-button>
                                    </a>
                                    @if (session('can_delete'))
                                        <button type="submit" id="popup-model"
                                            class="rounded-md border px-3 py-2 text-sm font-semibold text-red-500"
                                            onclick="document.getElementById('deleteModal-{{ $department['id'] }}').classList.remove('hidden')"><i
                                                class="fa-solid fa-xmark"></i>
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white border-2 border-gray-200  rounded-xl p-4">
            <div class="flex justify-center">
                {{ $departments->links('pagination::tailwind') }}
            </div><x-body-card>
                <x-slot name="title">
                    <div class="flex justify-between items-center">
                        <span>Member</span>

                        @if (session('can_write'))
                            <a href="{{ route('user-management-system.post.addPost', [$post['id'] ?? '']) }}">
                                <x-button class="text-medium">
                                    <i class="fa-solid fa-plus mr-2"></i>
                                </x-button>
                            </a>
                        @endif
                    </div>
                </x-slot>
            </x-body-card>

            <div class="overflow-x-auto">
                <table class="w-full text-center">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-4 py-2 font-medium text-gray-500 uppercase">Member Name</th>
                            @if (session('can_delete'))
                                <th class="px-4 py-2 font-medium text-gray-500 uppercase">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @if ($members->isEmpty())
                            <tr>
                                <td colspan="3" class="px-4 py-2 text-gray-500">No members found.</td>
                            </tr>
                        @endif
                        @foreach ($members as $member)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-2 font-medium text-gray-800">{{ $member['id'] }}</td>
                                <td class="px-4 py-2 font-medium text-gray-800">{{ $member['member_name'] }}</td>
                                @if (session('can_delete'))
                                    <td class="px-4 py-2">
                                        <div class="flex justify-center items-center gap-2 flex-wrap">
                                            <button type="button"
                                                class="rounded-md border px-3 py-2 text-sm font-semibold text-red-500"
                                                onclick="document.getElementById('deleteModal-{{ $member['id'] }}').classList.remove('hidden')">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>

                                            <!-- Delete Modal -->
                                            <div id="deleteModal-{{ $member['id'] }}"
                                                class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50">
                                                <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6 text-left">
                                                    <h3 class="text-lg font-semibold text-gray-900">Delete Member</h3>
                                                    <p class="mt-2 text-sm text-gray-600">Are you sure you want to
                                                        delete
                                                        this data?</p>
                                                    <div class="mt-6 flex justify-end gap-3">
                                                        <button type="button"
                                                            class="shadow bg-cyan-500 text-white font-bold py-2 px-4 rounded"
                                                            onclick="document.getElementById('deleteModal-{{ $member['id'] }}').classList.add('hidden')">
                                                            Cancel
                                                        </button>
                                                        <a
                                                            href="{{ route('user-management-system.team.deleteMember', ['id' => $member['id']]) }}">
                                                            <button type="button"
                                                                class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white">
                                                                Delete
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
