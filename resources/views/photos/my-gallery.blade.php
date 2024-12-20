@extends('layout')

@section('title')
{{ __('My Gallery') }}
@endsection

@section('content')

<div class="max-w-7xl grid justify-center md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($photos as $photo)
    <div class="bg-white rounded-lg shadow-lg">
        <img src="{{ asset($photo->image_path) }}" alt="{{ $photo->title }}" class="rounded-t-lg">
        <div class="p-4">
            <h3 class="text-lg font-semibold">{{ $photo->title }}</h3>
            <p>Uploaded by: {{ $photo->user->name }}</p>
            <div class="mt-2 flex justify-between">
                <a href="{{ route('photos.show', $photo->id) }}" class="text-blue-600 hover:underline">View</a>
                @auth
                <a href="{{ route('photos.edit', $photo->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                @endauth
            </div>
        </div>
    </div>
    
    @endforeach
</div>

@endsection