@extends('tailwind.layout.app')
@extends('tailwind.include.header')
@section('page_title', 'Home')
@section('content')

<form method="POST" action="{{ route('tailwind.userCreate') }}" class="max-w-2xl mx-auto border border-gray-200 rounded-lg p-6 bg-white mt-8 shadow-xl">
    @csrf
    <legend class="text-center text-2xl font-semibold mb-6 text-gray-800">Add User Data</legend>

    <input type="hidden" name="id" value="{{ $user['id'] ?? count(session('users') ?? []) + 1 }}">

    <div class="flex mb-4">
        <div class="w-1/4">
            <label for="name" class="block text-gray-700 font-bold text-right mb-1 pr-4">Name</label>
        </div>
        <div class="w-3/4">
            <input type="text" name="name" id="name" value="{{ $user['name'] ?? '' }}" placeholder="Brinda"
                required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        </div>
    </div>

    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <label for="email" class="block text-gray-700 font-bold text-right mb-1 pr-4">Email</label>
        </div>
        <div class="w-3/4">
            <input type="email" name="email" id="email" value="{{ $user['email'] ?? '' }}"
                placeholder="example@gmail.com" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        </div>
    </div>

    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <label for="phone" class="block text-gray-700 font-bold text-right mb-1 pr-4">Phone
                Number</label>
        </div>
        <div class="w-3/4">
            <input type="text" name="phone" id="phone" value="{{ $user['phone'] ?? '' }}"
                placeholder="987654321" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        </div>
    </div>

    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <span class="block text-gray-700 font-bold text-right mb-1 pr-4">Role</span>
        </div>
        <div class="w-3/4 flex flex-wrap gap-4">
            @foreach (['user', 'admin', 'manager', 'support'] as $role)
                <label class="inline-flex items-center cursor-pointer">
                    <input type="radio" name="radioBtn" value="{{ $role }}"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                        {{ (isset($user['role']) && $user['role'] == $role) || (!isset($user['role']) && $role == 'user') ? 'checked' : '' }}>
                    <span class="ml-2 text-sm font-medium text-gray-700 ">{{ $role }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <div class="flex items-center mb-6">
        <div class="w-1/4">
            <span class="block text-gray-700 font-bold text-right mb-1 pr-4">Status</span>
        </div>
        <div class="w-3/4 flex gap-4">
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="statusBtn" value="active"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                    {{ (isset($user['status']) && $user['status'] == 'active') || !isset($user['status']) ? 'checked' : '' }}>
                <span class="ml-2 text-sm font-medium text-gray-700">Active</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="statusBtn" value="inactive"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                    {{ isset($user['status']) && $user['status'] == 'inactive' ? 'checked' : '' }}>
                <span class="ml-2 text-sm font-medium text-gray-700">Inactive</span>
            </label>
        </div>
    </div>


    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <label class="block text-gray-700 font-bold text-right mb-1 pr-4">Gender</label>
        </div>
        <div class="w-3/4 flex gap-4">
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="profile[gender]" value="male"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                    {{ (isset($user['profile']['gender']) && $user['profile']['gender'] == 'male') || !isset($user['profile']['gender']) ? 'checked' : '' }}>
                <span class="ml-2 text-sm font-medium text-gray-700">Male</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="profile[gender]" value="female"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                    {{ isset($user['profile']['gender']) && $user['profile']['gender'] == 'female' ? 'checked' : '' }}>
                <span class="ml-2 text-sm font-medium text-gray-700">Female</span>
            </label>
        </div>
    </div>

    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <label for="profile[dob]" class="block text-gray-700 font-bold text-right mb-1 pr-4">Date of
                birth</label>
        </div>
        <div class="w-3/4">
            <input type="date" name="profile[dob]" id="profile[dob]" value="{{ $user['profile']['dob'] ?? '' }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        </div>
    </div>

    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <label for="inputState" class="block text-gray-700 font-bold text-right mb-1 pr-4">City</label>
        </div>
        <div class="w-3/4">
            <select id="inputState" name="address[city]"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                <option value="">Select city</option>
                @foreach (['rajkot' => 'Rajkot', 'ahmedabad' => 'Ahmedabad', 'surat' => 'Surat', 'vadodara' => 'Vadodara'] as $val => $label)
                    <option value="{{ $val }}"
                        {{ isset($user['address']['city']) && $user['address']['city'] == $val ? 'selected' : '' }}>
                        {{ $label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <label for="address[state]"
                class="block text-gray-700 font-bold text-right mb-1 pr-4">State</label>
        </div>
        <div class="w-3/4">
            <input type="text" name="address[state]" id="address[state]"
                value="{{ $user['address']['state'] ?? 'Gujarat' }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        </div>
    </div>

    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <label for="address[country]"
                class="block text-gray-700 font-bold text-right mb-1 pr-4">Country</label>
        </div>
        <div class="w-3/4">
            <input type="text" name="address[country]" id="address[country]"
                value="{{ $user['address']['country'] ?? 'India' }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        </div>
    </div>

    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <label for="address[pincode]"
                class="block text-gray-700 font-bold text-right mb-1 pr-4">Pincode</label>
        </div>
        <div class="w-3/4">
            <input type="text" name="address[pincode]" id="address[pincode]"
                value="{{ $user['address']['pincode'] ?? '' }}" placeholder="360001"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        </div>
    </div>

    <div class="flex items-center mb-4">
        <div class="w-1/4">
            <span class="block text-gray-700 font-bold text-right mb-1 pr-4">Permissions</span>
        </div>
        <div class="w-3/4 flex flex-wrap gap-4">
            <input type="checkbox" name="permission[view]" value="view"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"
                {{ (isset($user['permissions']['view'] ) && $user['permissions']['view'] == 'view') ? "checked" : "" }}>
            <span class="ml-2 text-sm font-medium text-gray-700 ">View</span>
            <input type="checkbox" name="permission[Read]" value="Read"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"
                {{ (isset($user['permissions']['Read'] ) && $user['permissions']['Read'] == 'Read') ? "checked" : "" }}>
            <span class="ml-2 text-sm font-medium text-gray-700 ">Read</span>
            <input type="checkbox" name="permission[Write]" value="Write"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"
                {{ (isset($user['permissions']['Write'] ) && $user['permissions']['Write'] == 'Write') ? "checked" : "" }}>
            <span class="ml-2 text-sm font-medium text-gray-700 ">Write</span>
        </div>
    </div>


    <div class="flex items-center justify-center">
        <div class="w-1/4"></div>
        <div class="w-3/4">
            <button type="submit"
                class="shadow bg-linear-to-r from-cyan-500 to-blue-500 text-white font-bold py-2 px-4 rounded">
                {{ isset($user) ? 'Update User' : 'Add User' }}
            </button>
        </div>
    </div>
</form>
@endsection
