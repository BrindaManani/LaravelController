@extends('Settings.layout.app')
@extends('Settings.includes.header')
@section('content')
    <div class="flex-1 bg-white border-2 boder-gray-800 rounded-xl p-3 h-fit mr-8">
        <x-body-card>Bot Protection</x-body-card>
        <form method="post" action="{{ route('general-settings-update') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-row gap-6 items-start my-6">
                <div class="flex-1">
                    <label for="site_name" class="block text-gray-700 text-sm font-semibold mb-1 ">Re-Captcha site Key<span
                            class="text-red-500">
                            *</span></label>
                    <input type="text" name="site_name" id="site_name"
                        value=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('site_name')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="site_description" class="block text-gray-700 text-sm font-semibold mb-1 ">Re-captcha site
                        sercet
                        <span class="text-red-500">
                            *</span></label>
                    <input type="text" name="site_description" id="site_description"
                        value="{{ $settings->site_description ?? old('site_description') }}"
                        value="{{ $user['site_description'] ?? old('site_description') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('site_description')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <x-card-footer></x-card-footer>
        </form>
    </div>
@endsection
