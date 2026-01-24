@extends('Settings.layout.app')
@extends('Settings.includes.header')
@section('content')
    <div class="flex-1 bg-white border-2 boder-gray-800 rounded-xl p-3 h-fit mr-8">
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
        <x-body-card><x-slot name="title">Announcements</x-slot>
            <p class="text-gray-500 mb-4">Create and manage global message that can be displayed accross the application to
                communicate important updates or information.</p>
        </x-body-card>
        <form method="post" action="{{ route('announcement-settings-update') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-row gap-6 items-start my-6">
                <div class="flex-1">
                    <label for="link" class="block text-gray-700 text-sm font-semibold mb-1 ">Link<span
                            class="text-red-500">
                            *</span></label>
                    <input type="text" name="link" id="link" value="{{ $announcement->link ?? old('link') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('link')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="link_text" class="block text-gray-700 text-sm font-semibold mb-1 ">Link Text
                    </label>
                    <input type="text" name="link_text" id="link_text" value="{{ $announcement->link ?? old('link-text') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('link_text')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="flex flex-row justify-around gap-6 my-6">
                <div class="flex-1">
                    <label for="address" class="block text-gray-700 font-bold mb-1">Message</label>
                    <textarea type="text" name="message" id="message" placeholder="hello"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">{{ $announcement->message ?? old('message') }}</textarea>
                </div>
            </div>
            <div class="flex flex-row gap-6 items-start my-6">
                <div class="flex-1">
                    <label for="link_color" class="block text-sm font-medium mb-2">Set Text Color<span class="text-red-500">
                            *</span></label>

                    <div class="w-full border rounded-lg">
                        <input type="color"
                            class="p-1 h-10 w-14 block bg-white cursor-pointer rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700"
                            id="link_color" value="{{ $announcement->link_color ?? old('bg_color') }}" name="link_color">
                    </div>
                    @error('site_logo')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="hs-color-input" class="block text-sm font-medium mb-2">Set Background Color<span
                            class="text-red-500">
                            *</span></label>

                    <div class="w-full border rounded-lg">
                        <input type="color"
                            class="p-1 h-10 w-14 block bg-white cursor-pointer rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700"
                            id="bg_color" value="{{ $announcement->bg_color ?? old('bg_color') }}" name="bg_color">
                    </div>
                    @error('site_logo')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="hs-color-input" class="block text-sm font-medium mb-2">Set message Color<span
                            class="text-red-500">
                            *</span></label>

                    <div class="w-full border rounded-lg">
                        <input type="color"
                            class="p-1 h-10 w-14 block bg-white cursor-pointer rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700"
                            id="msg_color" value="{{ $announcement->msg_color ?? old('bg_color') }}" name="msg_color">
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
