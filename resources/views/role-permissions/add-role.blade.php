@extends('Settings.layout.app')
@section('content')
    <form method="post" action="{{ route('create-role') }}" enctype="multipart/form-data" id="permissionForm">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 w-full">

            <div class="bg-white border-2 border-gray-200 rounded-xl p-4 h-auto">
                @if (session('success') || session('alert'))
                    <x-alert class="bg-green-50 text-green-700 px-3 py-2 border border-green-300 rounded text-sm mb-3 mt-3">
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
                <div class="flex flex-col md:flex-row gap-4 my-6">
                    <div class="w-full">
                        <label for="default_language" class="block text-gray-700 text-sm font-semibold mb-1 ">Role<span
                                class="text-red-500">
                                *</span>
                        </label>
                        <input type="text" name="role" id="role" placeholder="Enter role"
                            value="{{ $role->name ?? old('role') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                        @error('role')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <x-permission-table></x-permission-table>
                </div>

            </div>
            <div class="bg-white border-2 border-gray-200 rounded-xl p-4 h-auto">
                <x-body-card><x-slot name="title">List of users using this role</x-slot></x-body-card>
                    <div class="border rounded-xl mt-3">
                        <div class="flex justify-center w-full">
                            <input type="text" name="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-3 block w-1/2 p-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search user name" value="{{ request('search') }}">
                            {{-- <button type="submit"
                                class="bg-gray-100 border border-l-0 border-gray-300 rounded-r-lg px-3 py-2 hover:bg-gray-200">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button> --}}
                        </div>
                        @if (request('search'))
                            <a href="{{ url()->current() }}"
                                class="text-xs text-blue-600 flex items-center hover:underline">Clear</a>
                        @endif

                        <div class="p-4">
                        {{-- @forelse($users as $user)
                            <div class="flex items-center justify-between p-2 border-b last:border-0">
                                <span class="text-sm font-medium text-gray-700">{{ $user->name }}</span>
                                <span class="text-xs text-gray-500">{{ $user->email }}</span>
                            </div>
                        @empty
                            <p class="flex justify-center text-gray-500 italic">No users found</p>
                        @endforelse --}}

                    </div>
                    </div>
            </div>

        </div>
        <x-card-footer></x-card-footer>

    </form>
    <script>
        const toggle = document.getElementById('permission-toggle');
        const form = document.getElementById('permissionForm');

        toggle.addEventListener('change', () => {
            form.classList.toggle('hidden', toggle.checked);
        });
    </script>
@endsection()
