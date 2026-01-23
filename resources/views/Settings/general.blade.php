@extends('Settings.layout.app')
@extends('Settings.includes.header')
@section('content')
    <div class="flex-1 bg-white border-2 boder-gray-800 rounded-xl p-3 h-fit mr-8">
        <x-body-card></x-body-card>
        <form method="post" action="{{ route('general-settings-update') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-row gap-6 items-start my-6">
                <div class="flex-1">
                    <label for="site_name" class="block text-gray-700 text-sm font-semibold mb-1 ">Site Name<span
                            class="text-red-500">
                            *</span></label>
                    <input type="text" name="site_name" id="site_name"
                        value="{{ $settings->site_name ?? old('site_name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('site_name')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="site_description" class="block text-gray-700 text-sm font-semibold mb-1 ">Site
                        Description</label>
                    <input type="text" name="site_description" id="site_description"
                        value="{{ $settings->site_description ?? old('site_description') }}"
                        value="{{ $user['site_description'] ?? old('site_description') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('site_description')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="flex flex-row justify-around gap-6 my-6">
                <div class="flex flex-row gap-6 w-full">
                    <div class="flex-1">
                        <label for="timezone" class="block text-gray-700 text-sm font-semibold mb-1 ">Timezone</label>
                        <select name="timezone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                            @foreach (timezone_identifiers_list() as $timezone)
                                <option value="{{ $timezone }}"
                                    {{ $timezone == old('timezone', 'UTC') ? 'selected' : '' }}>
                                    {{ $timezone }}
                                </option>
                            @endforeach
                        </select>
                        @error('timezone')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="date_format" class="block text-gray-700 text-sm font-semibold mb-1 ">Date format</label>
                        <input type="date" name="date_format" id="date_format"
                            value="{{ $settings->date_format ?? old('date_format') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                        @error('date_format')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row gap-6 w-full">
                    <div class="flex-1">
                        <label for="time_format" class="block text-gray-700 text-sm font-semibold mb-1 ">Time Format</label>
                        <select name="time_format" id="time_format"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                            <option value="24h" {{ $settings->time_format == '24h' ? 'selected' : '' }}>24
                                Hours
                            </option>
                            <option value="12h" {{ $settings->time_format == '12h' ? 'selected' : '' }}>12
                                Hours
                            </option>
                        </select>
                        @error('time_format')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="default_language" class="block text-gray-700 text-sm font-semibold mb-1 ">Default
                            Language</label>
                        <select name="default_language" id="default_language"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                            <option value="English-Uk" {{ $settings->default_language == 'English-UK' ? 'selected' : '' }}>
                                English-UK
                            </option>
                            <option value="Spanish" {{ $settings->default_language == 'Spanish' ? 'selected' : '' }}>
                                Spanish
                            </option>
                            <option value="English-USA"
                                {{ $settings->default_language == 'Englsih-USA' ? 'selected' : '' }}>
                                English-USA
                            </option>
                            <option value="French" {{ $settings->default_language == 'French' ? 'selected' : '' }}>French
                            </option>
                        </select>
                        @error('language')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex flex-row gap-6 items-start my-6">
                <div class="flex-1">
                    <p class="block text-gray-700 text-sm font-semibold mb-1 ">Site Logo<span
                            class="text-gray-400 text-sm font-medium"> (Reommended 22px x 40px, max 512KB)</span></p>
                    <div class="flex items-center justify-center">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full bg-neutral-secondary-medium border border-dashed border-default-strong rounded-xl cursor-pointer hover:bg-neutral-tertiary-medium">
                            <div class="flex flex-col items-center justify-center text-body pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2" />
                                </svg>
                                <p class="text-sm font-mediun">Drag & Drop here</p>
                                <p class="text-xs text-gray-400">Or click to browse</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="site_logo"
                                value="{{ $settings->site_logo }}" />
                        </label>
                    </div>
                    @error('site_logo')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex-1">
                    <p class="block text-gray-700 text-sm font-semibold mb-1 ">Favicon<span
                            class="text-gray-400 text-sm font-medium"> (Reommended 22px x 40px, max 512KB)</span></p>
                    <div class="flex items-center justify-center">
                        <label for="favicon"
                            class="flex flex-col items-center justify-center w-full bg-neutral-secondary-medium border border-dashed border-default-strong rounded-xl cursor-pointer hover:bg-neutral-tertiary-medium">
                            <div class="flex flex-col items-center justify-center text-body pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2" />
                                </svg>
                                <p class="text-sm font-mediun">Drag & Drop here</p>
                                <p class="text-xs text-gray-400">Or click to browse</p>
                            </div>
                            <input id="favicon" type="file" class="hidden" name="favicon" />
                        </label>
                    </div>
                    @error('site_logo')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <x-card-footer></x-card-footer>

        </form>
    </div>
@endsection()
