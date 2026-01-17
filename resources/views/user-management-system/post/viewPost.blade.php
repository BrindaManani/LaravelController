@extends('user-management-system.layout.app')
@section('page_title', 'Post')
@section('content')
    <div class="flex mx-auto mt-20 items-center justify-center">
        <div class="bg-white block w-80 mx-h-lg border shadow-xl overflow-hidden">
            <a href="#">
                <img class="rounded-t-base mx-auto"
                    src="{{ $post->image ? asset('storage/' . $post->image->url) : asset('assets/img/profile.png') }}"
                    alt="" />
            </a>
            <div class="p-6 text-center">

                <a href="#">
                    <h5 class="mt-3 mb-6 text-2xl font-semibold tracking-tight text-heading">{{ $post->name }}</h5>
                </a>
                <p class="mt-3 mb-6 text=md font-medium tracking-tight text-heading">{{ $post->description }}</p>
            </div>
        </div>
    </div>
@endsection
