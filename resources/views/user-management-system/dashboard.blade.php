@extends('Settings.layout.app')
@section('page_title', 'Home')
@section('content')

    <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 py-6 mx-auto">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">

            <div class="group flex flex-col h-full border border-gray-200 rounded-lg shadow-xl">
                <div class="h-60 flex flex-col justify-center items-center rounded-t-xl"
                    style="background-color: rgba({{ $textColorRgb }},0.2);border-color: {{ $textColor }};">
                    <h2 class="text-5xl sm:text-6xl text-bold" style="color: {{ $textColor }}">{{ $count }}</h2>
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-lg sm:text-xl font-semibold">Total Engagement</h3>
                    Total Engagement
                    </h3>
                    <p class="mt-2 sm:mt-3 text-gray-500 text-sm sm:text-base">
                        The above count shows total users.
                    </p>
                </div>
            </div>

            <div class="group flex flex-col h-full border border-gray-200 rounded-lg shadow-xl">
                <div class="h-60 flex flex-col justify-center items-center rounded-t-xl"
                    style="background-color: rgba({{ $textColorRgb }},0.2);border-color: {{ $textColor }};">
                    <h2 class="text-5xl
                    sm:text-6xl text-bold" style="color: {{ $textColor }}">
                        {{ $activeUsersCount }}
                    </h2>
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-xl font-semibold">
                        Total Active users
                    </h3>
                    <p class="mt-3 text-gray-500">
                        The above count shows total active users.
                    </p>
                </div>
            </div>

            <div class="group flex flex-col h-full border border-gray-200 rounded-lg shadow-xl">
                <div class="h-60 flex flex-col justify-center items-center rounded-t-xl"
                    style="background-color: rgba({{ $textColorRgb }},0.2); border-color: {{ $textColor }};">
                    <h2 class="text-5xl
                    sm:text-6xl text-bold" style="color: {{ $textColor }}">
                        {{ $inactiveUsersCount }}
                    </h2>
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-xl font-semibold">
                        Total Inactive users
                    </h3>
                    <p class="mt-3 text-gray-500">
                        The above count shows total inactive users.
                    </p>
                </div>
            </div>

            <div class="group flex flex-col h-full border border-gray-200 rounded-lg shadow-xl">
                <div class="h-60 flex flex-col justify-center items-center rounded-t-xl"
                    style="background-color: rgba({{ $textColorRgb }},0.2);border-color: {{ $textColor }};">
                    <h2 class="text-5xl
                    sm:text-6xl text-bold" style="color: {{ $textColor }}">
                        {{ $blockUsersCount }}
                    </h2>
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-xl font-semibold">
                        Total Blocked users
                    </h3>
                    <p class="mt-3 text-gray-500">
                        The above count shows total blocked users.
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection
