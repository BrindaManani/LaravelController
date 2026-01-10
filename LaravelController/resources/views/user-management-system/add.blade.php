@extends('user-management-system.layout.app')
@extends('user-management-system.include.header')
@section('page_title', 'Home')
@section('content')


    <form method="POST" action="{{ route('user-management-system.createUser', [$user['id'] ?? '']) }}" enctype="multipart/form-data"
        class="max-w-3xl mx-auto border border-gray-200 rounded-lg p-6 bg-white mt-8 shadow-xl">
        @csrf
        <legend class="text-center text-2xl font-semibold mb-6 text-gray-800">Add User Data</legend>


        <div class="flex flex-row gap-4 items-start mb-6">
            <div class="flex-1">
                <label for="name" class="block text-gray-700 font-bold mb-1">First Name<span class="text-red-500">
                        *</span></label>
                <input type="text" name="first_name" id="first_name" value="{{  $user['first_name'] ?? ''}}" placeholder="Brinda"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                @error('first_name')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1">
                <label for="name" class="block text-gray-700 font-bold mb-1">Last Name<span class="text-red-500">
                        *</span></label>
                <input type="text" name="last_name" id="last_name" value="{{ $user['last_name'] ?? '' }}" placeholder="Brinda"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                @error('last_name')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="flex flex-row gap-4 items-start mb-6">
            <div class="flex-1">
                <label for="phone" class="block text-gray-700 font-bold mb-1">Phone Number<span class="text-red-500">
                        *</span></label>
                <input type="text" name="phone" id="phone" value="{{ $user['phone'] ?? '' }}"
                    placeholder="987654321"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                @error('phone')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex-1">
                <label for="email" class="block text-gray-700 font-bold mb-1">Email<span class="text-red-500">
                        *</span></label>
                <input type="text" name="email" id="email" value="{{ $user['email'] ?? '' }}"
                    placeholder="example@gmail.com"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                @error('email')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="flex flex-row gap-4 items-start mb-6">
            <div class="flex-1">
                <label for="phone" class="block text-gray-700 font-bold mb-1">Password<span class="text-red-500">
                        *</span> <p class="text-sm">(Uppercase, Lowercase & Number required)</p></label>
                <input type="password" name="password" id="password" value="{{ $user['password'] ?? '' }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                @error('password')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1">
                <label for="phone" class="block text-gray-700 font-bold mb-1">Confirm Password<span class="text-red-500">
                        *</span><p class="text-sm">(Must be same as password)</p></label>
                <input type="password" name="confirm_password" id="confirm_password" value="{{ $user['confirm_password'] ?? '' }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                @error('confirm_password')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="flex flex-row gap-10 mb-6">
            <div class="w-1/2 items-start">
                <div class="w-1/4">
                    <span class="block text-gray-700 font-bold mb-4">Role:</span>
                </div>
                <div class="grid grid-cols-4 gap-x-4 gap-y-2">
                    @foreach (['user', 'admin', 'manager', 'support'] as $role)
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="radioBtn" value="{{ $role }}"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                                {{ (isset($user['role']) && $user['role'] == $role) || (!isset($user['role']) && $role == 'user') ? 'checked' : '' }}>
                            <span class="ml-2 text-sm font-medium text-gray-700 capitalize">{{ $role }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="w-1/2 items-start">
                <div class="w-1/4">
                    <span class="block text-gray-700 font-bold mb-1 pr-4">Status:</span>
                </div>
                <div class="w-3/4 flex items-center gap-3">
                    <label for="hs-basic-usage" class="relative inline-block w-11 h-6 cursor-pointer">
                        <input type="checkbox" name="statusBtn" id="hs-basic-usage" class="peer sr-only" value="active"
                            {{ (isset($user['status']) && $user['status'] == 'active') || !isset($user['status']) ? 'checked' : '' }}>
                        <span
                            class="absolute inset-0 bg-gray-200 rounded-full transition-colors duration-200 ease-in-out peer-checked:bg-blue-600 dark:bg-neutral-700"></span>
                        <span
                            class="absolute top-1/2 start-0.5 -translate-y-1/2 size-5 bg-white rounded-full shadow-sm transition-transform duration-200 ease-in-out peer-checked:translate-x-full"></span>
                    </label>
                    <span class="text-sm text-gray-500">Active</span>
                </div>
            </div>
        </div>
        <div class="flex flex-row gap-10 mb-6">
            <div class="w-1/2 items-start">
                <div class="w-1/4">
                    <span class="block text-gray-700 font-bold mb-4">Gender:</span>
                </div>
                <div class="w-3/4 grid grid-cols-2 gap-x-4 gap-y-2">
                    <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="male"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                        {{ (isset($user['gender']) && $user['gender'] == 'male') || !isset($user['gender']) ? 'checked' : '' }}>
                    <span class="ml-2 text-sm font-medium text-gray-700">Male</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="female"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                        {{ isset($user['gender']) && $user['gender'] == 'female' ? 'checked' : '' }}>
                    <span class="ml-2 text-sm font-medium text-gray-700">Female</span>
                </label>
                </div>
            </div>

            <div class="w-1/2 items-start">
                <div class="">
                    <label for="dob" class="block text-gray-700 font-bold mb-1 pr-4">Date of
                    birth<span class="text-red-500"> *</span></label>
                </div>
                <div class=" items-center gap-3">
                    <input type="date" name="dob" id="dob" value="{{ $user['dob'] ?? '' }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                @error('dob')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>
        <div class="flex flex-row gap-4 items-start mb-6">
            <div class="flex-1">
                <label for="phone" class="block text-gray-700 font-bold mb-1">Address<span class="text-red-500">
                        *</span></label>
                <textarea type="text" name="address" id="address" placeholder="Kalavad road..."
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">{{ $user['address'] ?? "" }}</textarea>
                @error('address')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="flex flex-row gap-4 items-start mb-6">
            <div class="flex-1">
                <label for="inputState" class="block text-gray-700 font-bold mb-1 pr-4">City</label>
                <select id="inputState" name="city"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option value="">Select city</option>
                    @foreach (['rajkot' => 'Rajkot', 'ahmedabad' => 'Ahmedabad', 'surat' => 'Surat', 'vadodara' => 'Vadodara'] as $val => $label)
                        <option value="{{ $val }}"
                            {{ isset($user['city']) && $user['city'] == $val ? 'selected' : '' }}>
                            {{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1">
                <label for="address[state]" class="block text-gray-700 font-bold mb-1 pr-4">State</label>
                <input type="text" name="state" id="address[state]"
                    value="{{ $user['state'] ?? 'Gujarat' }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
            </div>
        </div>

        <div class="flex flex-row gap-4 items-start mb-6">
            <div class="flex-1">
                <label for="address[country]" class="block text-gray-700 font-bold mb-1 pr-4">Country</label>
                <input type="text" name="country" id="country"
                    value="{{ $user['country'] ?? 'India' }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
            </div>

            <div class="flex-1">
                <label for="address[pincode]" class="block text-gray-700 font-bold mb-1 pr-4">Pincode</label>
                <input type="text" name="pincode" id="pincode"
                    value="{{ $user['pincode'] ?? '' }}" placeholder="360001"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
            </div>
        </div>
        <div class="flex justify-center">
                <x-button type="submit">Submit</x-button>
        </div>
    </form>
@endsection
