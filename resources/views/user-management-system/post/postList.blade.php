@extends('Settings.layout.app')
@section('page_title', 'Home')
@section('content')
    @if (session('success') || session('alert'))
        <x-alert class="text-center bg-green-200 text-xl text-green-700">
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

    <div class="max-w-7xl mx-auto bg-white border-2 border-gray-200 rounded-xl p-4 h-auto">
        <x-body-card>
            <x-slot name="title">
                <div class="flex justify-between items-center">
                    <span>Post</span>

                    @if (session('can_write'))
                        <a href="{{ route('user-management-system.post.addPost', [$post['id'] ?? '']) }}">
                            <x-button class="text-medium">
                                <i class="fa-solid fa-plus mr-2"></i>
                            </x-button>
                        </a>
                    @endif
                </div>
            </x-slot>
        </x-body-card>


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-3">
            @foreach ($posts as $post)
                <div class="bg-white border-2 border-gray-200 rounded-xl flex flex-col p-4 h-full">
                    <div class="flex justify-center mb-4">
                        <img src="{{ $post->image ? asset('storage/' . $post->image->url) : asset('assets/img/profile.png') }}"
                            class="w-24 h-24 rounded-xl object-cover border" alt="Post image">
                    </div>

                    <div class="text-center flex-1">
                        <h3 class="text-lg font-semibold text-gray-800">
                            {{ $post->name }}
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ $post->description ?? '' }}
                        </p>
                    </div>

                    <div class="flex justify-center flex-wrap gap-2 mt-auto">
                        @if (session('can_write'))
                            <a href="{{ route('user-management-system.post.addPost', $post['id']) }}">
                                <x-button>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </x-button>
                            </a>

                            @if (session('can_delete'))
                                <button class="rounded-md border px-3 py-2 text-sm font-semibold text-red-500"
                                    onclick="document.getElementById('deleteModal-{{ $post['id'] }}').classList.remove('hidden')">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-8">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>

    <div class="flex justify-center">
        {{ $posts->links('pagination::tailwind') }}
    </div>
@endsection
