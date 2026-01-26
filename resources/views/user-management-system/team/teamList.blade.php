@extends('Settings.layout.app')
@section('page_title', 'Teams & Members')
@section('content')
    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-6 ">
        <div class="bg-white border-2 border-gray-200  rounded-xl p-4">
            <x-body-card>
                <x-slot name="title">
                    <div class="flex justify-between items-center">
                        <span>team</span>

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
                <table class="w-full text-center">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-4 py-2 font-medium text-gray-500 uppercase">Team Name</th>
                            <th class="px-4 py-2 font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @if ($teams->isEmpty())
                            <tr>
                                <td colspan="3" class="px-4 py-2 text-gray-500">No members found.</td>
                            </tr>
                        @endif
                        @foreach ($teams as $team)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-2 font-medium text-gray-800">{{ $team['id'] ?: '-' }}</td>
                                <td class="px-4 py-2 font-medium text-gray-800">{{ $team['name'] }}</td>
                                <td class="px-4 py-2">
                                    <div class="flex justify-center items-center gap-2 flex-wrap">
                                        <a href="{{ route('user-management-system.team.teamList', $team['id']) }}">
                                            <x-button type="button">
                                                <i class="fa-solid fa-eye"></i>
                                            </x-button>
                                        </a>
                                        <a href="{{ route('user-management-system.team.addTeam', $team['id']) }}"
                                            class="text-sm/6 font-semibold text-white">
                                            <x-button type="submit"><i class="fa-solid fa-pen-to-square"></i> </x-button>
                                        </a>
                                        @if (session('can_delete'))
                                            <button type="submit" id="popup-model"
                                                class="rounded-md border px-3 py-2 text-sm font-semibold text-red-500"
                                                onclick="document.getElementById('deleteModal-{{ $team['id'] }}').classList.remove('hidden')"><i
                                                    class="fa-solid fa-xmark"></i>
                                            </button>

                                            <div id="deleteModal-{{ $team['id'] }}"
                                                class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50">

                                                <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6 text-left">
                                                    <h3 class="text-lg font-semibold text-gray-900">
                                                        Delete team
                                                    </h3>

                                                    <p class="mt-2 text-sm text-gray-600">
                                                        Are you sure you want to delete this data?
                                                    </p>

                                                    <div class="mt-6 flex justify-end gap-3">
                                                        <button type="button"
                                                            class="shadow  bg-cyan-500 text-white font-bold py-2 px-4 rounded"
                                                            onclick="document.getElementById('deleteModal-{{ $team['id'] }}').classList.add('hidden')">Cancel
                                                        </button>

                                                        <a
                                                            href="{{ route('user-management-system.team.teamDelete', ['id' => $team['id']]) }}">
                                                            <button type="button"
                                                                class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white">delete</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white border-2 border-gray-200  rounded-xl p-4">
            <x-body-card>
                <x-slot name="title">
                    <div class="flex justify-between items-center">
                        <span>Members</span>

                        @if (session('can_write'))
                            <a href="{{ route('user-management-system.team.addMember', [$team['id'] ?? '']) }}">
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
                                                    <p class="mt-2 text-sm text-gray-600">Are you sure you want to delete
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

    <div class="flex justify-center mt-6">
        {{ $teams->links('pagination::tailwind') }}
    </div>
@endsection
