@extends('layout')

@section('title')
{{ __('Photo Details') }}
@endsection

@section('content')


<div class="md:fixed md:inset-40 h-screen grid lg:grid-cols-2 justify-center space-x-6 overflow-y-auto scrollbar-hide">
    <div class="max-w-xl h-max bg-white rounded-lg shadow-lg">
        <img src="{{ asset($photo->image_path) }}" alt="{{ $photo->title }}" class="rounded-t-lg w-full">
        <div class="p-4">
            <h1 class="text-2xl font-bold mb-2">{{ $photo->title }}</h1>
            <p class="text-sm text-gray-500">Uploaded on: {{ $photo->created_at ? $photo->created_at->format('F j, Y') : '' }}</p>
            <div class="mt-4">
                <a href="{{ route('photos.index') }}" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-4 py-2">Back to Gallery</a>
            </div>
        </div>
    </div>
    <div class="max-w-md">
        <a href="" class="flex items-center mb-2 pb-2 border-b border-gray-300">
            <img src="{{ asset('imgs/dog.jpg') }}" alt="user_photo" class="w-10 h-10 bg-white rounded-full border border-gray-800 shadow-lg">
            <p class="font-semibold ml-2">{{ $photo->user->name }}</p>
        </a>

        <div class="h-screen grid gap-y-2 pb-64 overflow-y-auto scrollbar-hide">
            <div class="h-max bg-white border border-gray-300 rounded-lg p-2 shadow-md">
                <a href="" class="flex items-center mb-2">
                    <img src="{{ asset('imgs/dog.jpg') }}" alt="user_photo" class="w-10 h-10 bg-white rounded-full border border-gray-800 shadow-lg">
                    <p class="font-semibold mx-2">{{ $photo->user->name }}</p>
                </a>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia temporibus aliquam vitae minus, et vero, molestias adipisci repellat rerum quia tenetur? Quae perferendis libero unde vero consequuntur adipisci in nihil.
            </div>

        </div>
    </div>
</div>
@endsection