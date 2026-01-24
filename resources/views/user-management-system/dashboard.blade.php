@extends('Settings.layout.app')
@extends('Settings.includes.header')
@section('page_title', 'Home')
@section('content')

<div class="max-w-[85rem] px-8 py-14 mt-30 mx-auto">

  <div class="grid grid-cols-4 gap-6">

    <div class="group flex flex-col h-full border border-gray-200 rounded-lg shadow-xl">
      <div class="h-60 flex flex-col justify-center items-center bg-blue-200 rounded-t-xl">
        <h2 class="text-6xl text-bold" style="color: {{ $textColor }}">{{ $count }}</h2>
      </div>
      <div class="p-4 md:p-6">
        <h3 class="text-xl font-semibold">
          Total Engagement
        </h3>
        <p class="mt-3 text-gray-500">
          The above count shows total users.
        </p>
      </div>
    </div>

    <div class="group flex flex-col h-full border border-gray-200 rounded-lg shadow-xl">
      <div class="h-60 flex flex-col justify-center items-center bg-blue-200 rounded-t-xl">
        <h2 class="text-6xl text-bold" style="color: {{ $textColor }}">{{ $activeUsersCount }}</h2>
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
      <div class="h-60 flex flex-col justify-center items-center bg-blue-200 rounded-t-xl">
        <h2 class="text-6xl text-bold" style="color: {{ $textColor }}">{{ $inactiveUsersCount }}</h2>
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
      <div class="h-60 flex flex-col justify-center items-center bg-blue-200 rounded-t-xl">
        <h2 class="text-6xl text-bold" style="color: {{ $textColor }}">{{ $blockUsersCount }}</h2>
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