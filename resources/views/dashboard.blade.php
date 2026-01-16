<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-[85rem] px-8 py-14 mt-30 mx-auto">

  <div class="grid grid-cols-4 gap-6">

    <div class="group flex flex-col h-full border border-gray-200 rounded-lg shadow-xl">
      <div class="h-50 flex flex-col justify-center items-center  bg-cyan-500 rounded-t-xl">
        <h2 class="text-6xl text-green-500 text-bold">{{ 10 }}</h2>
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
      <div class="h-50 flex flex-col justify-center items-center bg-linear-to-r from-green-300 to-teal-500 rounded-t-xl">
        <h2 class="text-6xl text-white text-bold">{{ 6 }}</h2>
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
      <div class="h-50 flex flex-col justify-center items-center bg-linear-to-r from-orange-300 to-red-500 rounded-t-xl">
        <h2 class="text-6xl text-white text-bold">{{ 4 }}</h2>
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
      <div class="h-50 flex flex-col justify-center items-center bg-linear-to-r from-gray-400 to-stone-500 rounded-t-xl">
        <h2 class="text-6xl text-white text-bold">{{ 0 }}</h2>
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
</x-app-layout>
