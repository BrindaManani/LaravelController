@extends('tailwind-task.layout.app')
@extends('tailwind-task.includes.header')
@extends('tailwind-task.includes.slidebar')
@section('content')
<div class="ml-48 mt-4 p-4 flex flex-row gap-4 items-start">
    <div class="bg-white rounded p-4 w-1/4">
        <ul>
            <li class="border px-3 py-2 rounded hover:border-pink-500 hover:text-pink-900 font-medium text-gray-500">General settings</li>
            <li class="border px-3 py-2 rounded hover:border-pink-500 hover:text-pink-900 font-medium text-gray-500">Profile settings </li>
            <li class="border px-3 py-2 rounded hover:border-pink-500 hover:text-pink-900 font-medium text-gray-500">System settings</li>
            <li class="border px-3 py-2 rounded hover:border-pink-500 hover:text-pink-900 font-medium text-gray-500">General settings</li>
            <li class="border px-3 py-2 rounded hover:border-pink-500 hover:text-pink-900 font-medium text-gray-500">General settings</li>
            <li class="border px-3 py-2 rounded hover:border-pink-500 hover:text-pink-900 font-medium text-gray-500">General settings</li>
            <li class="border px-3 py-2 rounded hover:border-pink-500 hover:text-pink-900 font-medium text-gray-500">General settings</li>
        </ul>
    </div>
    <div class="flex-1 bg-white border rounded p-6 min-h-[200px]">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Dashboard Card</h2>
        <p class="text-gray-500 mb-4">
            This is the main dashboard card content. You can add statistics, charts, summaries, or any important information here.
        </p>
        <p class="text-gray-600">You can also add buttons, charts, or tables inside this card for more details.</p>
    </div>
</div>

@endsection()