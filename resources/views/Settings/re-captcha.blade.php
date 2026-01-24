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
        <x-body-card>
            <div class="flex justify-between">
                <div class="flex"><x-slot name="title">Bot Protection</x-slot>
                    <p class="text-gray-500 mb-4">Implement advanced bot prevention and user verification mechanisms to
                        protect your application from automated attacks and spams.</p>
                </div>
                <div class="flex justify-end">
                    <label for="hs-basic-usage" class="relative inline-block w-11 h-6 cursor-pointer" id="toggle">
                        <input type="checkbox" name="statusBtn" id="hs-basic-usage" class="peer sr-only">
                        <span
                            class="absolute inset-0 bg-gray-200 rounded-full transition-colors duration-200 ease-in-out peer-checked:bg-rose-500"></span>
                        <span
                            class="absolute top-1/2 start-0.5 -translate-y-1/2 size-5 bg-white rounded-full shadow-sm transition-transform duration-200 ease-in-out peer-checked:translate-x-full"></span>
                    </label>
                </div>
            </div>
        </x-body-card>
        <form method="post" action="{{ route('re-captcha-settings') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-row gap-6 items-start my-6 hidden" id="form">
                <div class="flex-1">
                    <label for="site_key" class="block text-gray-700 text-sm font-semibold mb-1 ">Re-Captcha site
                        Key<span class="text-red-500">
                            *</span></label>
                    <input type="text" name="site_key" id="site_key" placeholder="Re-Captcha site Key"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('site_key')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="site_secret" class="block text-gray-700 text-sm font-semibold mb-1 ">Re-captcha
                        site sercet
                        <span class="text-red-500">
                            *</span></label>
                    <input type="text" name="site_secret" id="site_secret" placeholder="Re-captcha site sercet"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('site_secret')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="px-3 py-2 border border-yello-300 rounded text-sm mb-3 mt-3"
                style="color: {{ $textColor }}; border: 1px solid {{ $textColor }}; opacity:0.8">
                <i class="fa-solid fa-triangle-exclamation"></i> Important Configuration Notice<p>Make sure to select
                    reCAPTCHA v3 when setting up your credentials. Using
                    incorrect settings may cause authentication system interruptions.</p>
            </div>
            <x-card-footer></x-card-footer>
        </form>
    </div>
    <script>
        const toggle = document.getElementById('toggle');
        const form = document.getElementById('form');

        toggle.addEventListener('change', () => {
            form.classList.toggle('hidden', toggle.checked);
        });
    </script>
@endsection
