@extends('template.layout.app')
@extends('template.includes.header')
@extends('template.includes.slidebar')
{{-- @extends('tailwind-task.includes.menu') --}}
@section('content')
<div class="ml-48 mt-4 p-4 flex flex-row gap-4 items-start">
    <x-menu></x-menu>
    <div class="flex-1 bg-white border-2 boder-gray-800 rounded-xl p-6 h-fit">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">General Settings</h2>
        <p class="text-gray-500 mb-4">
            This is the main dashboard card content. You can add statistics, charts, summaries, or any important information here.
        </p>
    </div>
</div>

@endsection()