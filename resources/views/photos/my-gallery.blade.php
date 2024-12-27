@extends('layout')

@section('title')
{{ __('My Gallery') }}
@endsection

@section('content')

@if($photos->isEmpty())
<div class="flex flex-col items-center justify-center h-full text-center p-6 rounded-lg">
    <svg class="w-16 h-16 text-gray-400 dark:text-gray-600 mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M8 11V9a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm7 1a1 1 0 0 0 1-1V9a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1zm-3 2a6.036 6.036 0 0 0-4.775 2.368 1 1 0 1 0 1.55 1.264 4 4 0 0 1 6.45 0 1 1 0 0 0 1.55-1.264A6.036 6.036 0 0 0 12 14zm11-2A11 11 0 1 1 12 1a11.013 11.013 0 0 1 11 11zm-2 0a9 9 0 1 0-9 9 9.01 9.01 0 0 0 9-9z" />
    </svg>
    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Oops! No Photos Uploaded Yet</h2>
    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">It looks like you haven't shared any photos yet. Let's change that!</p>
    <a href="{{ route('photos.create') }}" class="inline-flex items-center px-6 py-2 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
        Upload Your First Photo
    </a>
</div>
@endif

<div class="max-w-7xl grid justify-center md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($photos as $photo)
    <div class="bg-white rounded-lg shadow-lg">
        <img src="{{ asset($photo->image_path) }}" alt="{{ $photo->title }}" class="w-[400px] h-[300px] bg-black object-contain rounded-t-lg">
        <div class="p-4">
            <h3 class="text-lg font-semibold">{{ $photo->title }}</h3>
            <div class="mt-2 flex justify-between">
                <a href="{{ route('photos.show', $photo->id) }}" class="text-blue-600 hover:underline">View</a>
            </div>
        </div>
    </div>

    @endforeach
</div>

@endsection