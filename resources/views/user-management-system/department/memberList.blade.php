@extends('user-management-system.layout.app')
{{-- @extends('user-management-system.include.header') --}}
@section('page_title', 'Member-List')
@section('content')

    <table id="dept-list-table" class="mx-auto mt-12 mb-6 border border-gray-200 rounded-lg shadow-xl">

        <thead>
            <tr>
                <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase ">Id</th>
                <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase">member Name</th>

                @if (session('can_delete'))
                    <th scope="col"class="px-6 py-3 font-medium text-gray-500 uppercase">Action</th>
                @endif
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($members as $member)
                <tr>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $member['id'] ?: 'null' }}</td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $member['member_name'] }}</td>

                    @if (session('can_delete'))
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                            <button type="submit" id="popup-model"
                                class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white"
                                onclick="document.getElementById('deleteModal-{{ $member['id'] }}').classList.remove('hidden')"><i
                                    class="fa-solid fa-xmark"></i> Delete
                            </button>

                            <div id="deleteModal-{{ $member['id'] }}"
                                class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50">

                                <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6 text-left">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Delete member
                                    </h3>

                                    <p class="mt-2 text-sm text-gray-600">
                                        Are you sure you want to delete this data?
                                    </p>

                                    <div class="mt-6 flex justify-end gap-3">
                                        <button type="button"
                                            class="shadow  bg-cyan-500 text-white font-bold py-2 px-4 rounded"
                                            onclick="document.getElementById('deleteModal-{{ $member['id'] }}').classList.add('hidden')">Cancel
                                        </button>

                                        <a
                                            href="{{ route('user-management-system.department.deleteMember', ['id' => $member['id']]) }}">
                                            <button type="button"
                                                class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white">delete</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
