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
        <x-body-card><x-slot name="title">Email Configuration</x-slot>
            <p class="text-gray-500 mb-4">Manage SMTP settings, email templates, and outgoing communication preference to
                ensure reliable and professional email communications.</p>
        </x-body-card>
        <div class="bg-gray-50 text-blue-500 px-3 py-2 rounded text-sm mb-3 mt-3"
            style="color: {{ $textColor }}; border: 1px solid {{ $textColor }}; opacity:0.8">
            <i class="fa-solid fa-triangle-exclamation"></i> Configuration Guide<p>Please configure your email settings
                accuratly. This application will rely on your specified email server to handle email delivery. Errors
                encountered during email operations are typically due to incorrect settings. Ensure all credentials, such as
                the port, encryption method, and SMTP details, are correct. Usethe send test email button to validate your
                configuration. If an error occurs, review your setting and try again.</p>
        </div>
        <form method="post" action="{{ route('email-settings-update') }}" enctype="multipart/form-data">
            @csrf
            <h2 class="text-lg font-medium text-gray-700 mb-2">SMTP Configuration</h2>
            <div class="flex flex-row gap-6 items-start my-6">
                <div class="flex-1">
                    <label for="smtp_host" class="block text-gray-700 text-sm font-semibold mb-1 ">SMTP Host</label>
                    <input type="text" name="smtp_host" id="smtp_host"
                        value="{{ $email->smtp_host ?? old('smtp_host') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('smtp_host')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="smtp_port" class="block text-gray-700 text-sm font-semibold mb-1 ">SMTP Port</label>
                    <input type="text" name="smtp_port" id="smtp_port"
                        value="{{ $email->smtp_port ?? old('smtp_port') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('smtp_port')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="encryption" class="block text-gray-700 text-sm font-semibold mb-1 ">Encryption
                    </label>
                    <select name="time_format" id="time_format"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                        <option value="tls" {{ $settings->time_format == '24h' ? 'selected' : '' }}>TLS
                        </option>
                        <option value="ssl" {{ $settings->time_format == '12h' ? 'selected' : '' }}>SSL
                        </option>
                        <option value="ssh" {{ $settings->time_format == '24h' ? 'selected' : '' }}>SSh
                        </option>
                        <option value="ipsec" {{ $settings->time_format == '12h' ? 'selected' : '' }}>IPsec
                        </option>
                    </select>
                    @error('encryption')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="flex flex-row justify-around gap-6 my-6">
                <div class="flex-1">
                    <label for="username" class="block text-gray-700 text-sm font-semibold mb-1 ">SMTP Username</label>
                    <input type="text" name="username" id="username" value="{{ $email->username ?? old('username') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('username')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="password" class="block text-gray-700 text-sm font-semibold mb-1 ">SMTP Password</label>
                    <input type="password" name="password" id="password" value="{{ $email->password ?? old('password') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('password')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="border mb-4"></div>
            <h2 class="text-lg font-medium text-gray-700 mb-2">Default Sender</h2>
            <div class="flex flex-row gap-6 items-start my-6">
                <div class="flex-1">
                    <label for="sender_name" class="block text-gray-700 text-sm font-semibold mb-1 ">Sender Name</label>
                    <input type="text" name="sender_name" id="sender_name"
                        value="{{ $email->sender_name ?? old('sender_name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('sender_name')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="sender_email" class="block text-gray-700 text-sm font-semibold mb-1 ">Sender Email</label>
                    <input type="text" name="sender_email" id="sender_email"
                        value="{{ $email->sender_email ?? old('sender_email') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">
                    @error('sender_email')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="border mb-4"></div>
            <h2 class="text-lg font-medium text-gray-700 mb-2">Send Test Email</h2>
            <p class="text-gray-500 mb-4">Send test email to make sure that your SMTP settings is set correctly</p>
            <div class="flex flex-row gap-6 items-start my-6">
                <div class="flex-1">
                    <input type="text" name="test_email" id="test_email"
                        value="{{ $email->test_email ?? old('test_email') }}" placeholder="Enter email address for testing"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-1.5">

                    @error('test_email')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div><x-button
                        class="text-white border rounded-xl hover:bg-rose-700 shadow-xs font-medium text-sm px-4 py-1.5 "
                        style="background-color: {{ $textColor }}">Test

                    </x-button></div>
            </div>
            <x-card-footer></x-card-footer>

        </form>
    </div>
@endsection()
