@extends('Settings.layout.app')
@section('content')
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
            <div>
                <x-body-card><x-slot name="title">Personal Information</x-slot>
                </x-body-card>
                <form method="post" action="{{ route('user-management-system.team.createTeam') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex items-center gap-3 mt-3">
                        <div class="w-16 h-16 rounded-full border-2 border-gray-300 shadow overflow-hidden bg-gray-100">
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }} Logo"
                                class="h-10 w-auto object-contain">
                        </div>

                        <div>
                            <label for="avatarInput"
                                class="flex items-center gap-1 px-2 py-1 text-xs border border-gray-300 rounded-md cursor-pointer
                   text-gray-600 hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5-5 5 5M12 5v12" />
                                </svg>
                                Upload
                            </label>

                            <input type="file" id="avatarInput" name="avatar" accept="image/*" class="hidden"
                                onchange="previewImage(event)">
                        </div>
                    </div>



                    <div class="flex flex-col md:flex-row gap-4 my-6">
                        <div class="w-full">
                            <label for="name" class="block text-gray-700 text-sm font-semibold mb-1 ">Full Name<span
                                    class="text-red-500">
                                    *</span></label>
                            <input type="text" name="name" id="name" placeholder="Enter first name"
                                value="{{ $settings->name ?? old('name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                            @error('name')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-row justify-around gap-6 my-6">
                        <div class="flex flex-row gap-6 w-full">
                            <div class="w-full">
                                <label for="email" class="block text-gray-700 text-sm font-semibold mb-1 ">Email<span
                                        class="text-red-500"> *</span>
                                </label>
                                <input type="text" name="email" id="email" placeholder="Enter email"
                                    value="{{ $settings->email ?? old('email') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                                @error('email')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="phone" class="block text-gray-700 text-sm font-semibold mb-1 ">Phone<span
                                        class="text-red-500"> *</span>
                                </label>
                                <input type="text" name="phone" id="phone" placeholder="Enter phone number"
                                    value="{{ $settings->phone ?? old('phone') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                                @error('phone')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-around gap-6 my-6">
                        <div class="flex flex-row gap-6 w-full">
                            <div class="w-full">
                                <label for="email"
                                    class="block text-gray-700 text-sm font-semibold mb-1 ">Department<span
                                        class="text-red-500"> *</span>
                                </label>
                                <select name="default_language" id="default_language"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ $department->id == ($user->user_department->department->id ?? '') ? 'selected' : '' }}>
                                            {{ $department->department }}</option>
                                    @endforeach
                                </select>
                                @error('email')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="phone" class="block text-gray-700 text-sm font-semibold mb-1 ">User
                                    Code<span class="text-red-500"> *</span>
                                </label>
                                <input type="text" name="phone" id="phone" placeholder="ADM-001"
                                    value="{{ $settings->phone ?? old('phone') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                                @error('phone')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 my-6">
                        <div class="w-full">
                            <label for="default_language" class="block text-gray-700 text-sm font-semibold mb-1 ">Select
                                Language</label>
                            <select name="default_language" id="default_language"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                                <option value="English-Uk"
                                    {{ $settings->default_language == 'English-UK' ? 'selected' : '' }}>
                                    English-UK
                                </option>
                                <option value="Spanish" {{ $settings->default_language == 'Spanish' ? 'selected' : '' }}>
                                    Spanish
                                </option>
                                <option value="English-USA"
                                    {{ $settings->default_language == 'Englsih-USA' ? 'selected' : '' }}>
                                    English-USA
                                </option>
                                <option value="French" {{ $settings->default_language == 'French' ? 'selected' : '' }}>
                                    French
                                </option>
                            </select>
                            @error('language')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="default_language" class="block text-gray-700 text-sm font-semibold mb-1 ">Select
                                Country</label>
                            <select name="select_country" id="select_country"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                                <option value="English-Uk">
                                    India
                                </option>
                                <option value="Spanish">
                                    USA
                                </option>
                                <option value="English-USA">
                                    US
                                </option>
                                <option value="French">Russia
                                </option>
                            </select>
                            @error('select_country')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-row gap-6 items-start my-6 border-b">
                        <div class="w-full">
                            <label for="address" class="block text-gray-700 font-bold mb-1">Address</label>
                            <textarea type="text" name="address" id="address" placeholder=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"></textarea>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 my-6">
                        <div class="w-full">
                            <label for="password" class="block text-gray-700 text-sm font-semibold mb-1 ">Password<span
                                    class="text-red-500"> *</span>
                            </label>
                            <input type="password" name="password" id="password" placeholder="Entyer your password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                            @error('password')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 my-6">
                        <div class="w-full">
                            <label for="confirm_password" class="block text-gray-700 text-sm font-semibold mb-1 ">Confirm
                                Password<span class="text-red-500"> *</span>
                            </label>
                            <input type="password" name="confirm_password" id="confirm_password"
                                placeholder="Entyer your confirm_password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                            @error('confirm_password')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 my-6">
                        <div class="w-full">
                            <div class="flex justify-between">
                                <div class="w-full">Send Welcome Mail<p>Send walcome email to new users after
                                        regitration.
                                </div>
                                <div class="flex">
                                    <label for="mail-toggle" class="relative inline-block w-11 h-6 cursor-pointer"
                                        id="toggle">
                                        <input type="checkbox" name="mail-toggle" id="mail-toggle" class="peer sr-only">
                                        <span
                                            class="absolute inset-0 bg-gray-200 rounded-full transition-colors duration-200 ease-in-out peer-checked:bg-blue-500"></span>
                                        <span
                                            class="absolute top-1/2 start-0.5 -translate-y-1/2 size-5 bg-white rounded-full shadow-sm transition-transform duration-200 ease-in-out peer-checked:translate-x-full"></span>
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="w-full">
                            <div class="flex justify-between">
                                <div class="w-full">Is varified User<p>Mark email as verified or send verification
                                        email
                                </div>
                                <div class="flex">
                                    <label for="hs-basic-usage" class="relative inline-block w-11 h-6 cursor-pointer"
                                        id="toggle">
                                        <input type="checkbox" name="statusBtn" id="hs-basic-usage"
                                            class="peer sr-only">
                                        <span
                                            class="absolute inset-0 bg-gray-200 rounded-full transition-colors duration-200 ease-in-out peer-checked:bg-blue-500"></span>
                                        <span
                                            class="absolute top-1/2 start-0.5 -translate-y-1/2 size-5 bg-white rounded-full shadow-sm transition-transform duration-200 ease-in-out peer-checked:translate-x-full"></span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="bg-white border-2 border-gray-200 rounded-xl p-4 h-auto">
            <x-body-card><x-slot name="title">Roles & Permissions</x-slot>
            </x-body-card>
            <div class="flex flex-col md:flex-row gap-4 my-6">
                <div class="w-full">
                    <div class="flex justify-between">
                        <div class="w-full">Administartor Access<p>Administrator access have unrestricted access to all
                                features and functions.
                        </div>
                        <div class="flex">
                            <div class="flex justify-end">
                                <label for="permission-toggle" class="relative inline-block w-11 h-6 cursor-pointer"
                                    id="toggle">
                                    <input type="checkbox" name="permission-toggle" id="permission-toggle"
                                        class="peer sr-only">
                                    <span
                                        class="absolute inset-0 bg-gray-200 rounded-full transition-colors duration-200 ease-in-out peer-checked:bg-blue-500"></span>
                                    <span
                                        class="absolute top-1/2 start-0.5 -translate-y-1/2 size-5 bg-white rounded-full shadow-sm transition-transform duration-200 ease-in-out peer-checked:translate-x-full"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <form method="post" action="{{ route('general-settings-update') }}" enctype="multipart/form-data"
                id="permissionForm">
                @csrf
                <div class="flex flex-col md:flex-row gap-4 my-6">
                    <div class="w-full">
                        <label for="default_language" class="block text-gray-700 text-sm font-semibold mb-1 ">Role<span
                                class="text-red-500">
                                *</span>
                        </label>
                        <select name="default_language" id="default_language"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                            <option value="user">
                                User
                            </option>
                            <option value="admin">
                                Admin
                            </option>
                            <option value="manager">
                                Manager
                            </option>
                            <option value="support">
                                Support
                            </option>
                        </select>
                        @error('language')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <x-permission-table></x-permission-table>
                </div>

            </form>
        </div>
    </div>
    <x-card-footer></x-card-footer>
    <script>
        const toggle = document.getElementById('permission-toggle');
        const form = document.getElementById('permissionForm');

        toggle.addEventListener('change', () => {
            form.classList.toggle('hidden', toggle.checked);
        });
    </script>
@endsection()
