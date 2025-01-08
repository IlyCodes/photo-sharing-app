@extends('layout')

@section('title')
{{ __('Photo Details') }}
@endsection

@section('content')

<div class="md:fixed md:inset-40 h-screen grid lg:grid-cols-2 justify-center space-x-12 overflow-y-auto scrollbar-hide">
    <div class="max-w-xl h-max bg-white rounded-lg shadow-lg">
        <img src="{{ asset($photo->image_path) }}" alt="{{ $photo->title }}" class="w-[500px] h-[400px] bg-black object-contain object-center rounded-t-lg lg:w-full">
        <div class="p-4">
            <h1 class="text-2xl font-bold mb-2">{{ $photo->title }}</h1>
            <p class="text-sm text-gray-500">{{ $photo->created_at ? $photo->created_at->format('j F Y') : '' }}</p>
            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('photos.index') }}" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-4 py-2">Back to Gallery</a>
                @if(Auth::id() == $photo->user_id)
                <div class="flex items-center space-x-2">
                    <a href="{{ route('photos.edit', $photo->id) }}" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-4 py-2">Edit</a>
                    <form action="{{ route('photos.destroy', $photo->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-4 py-2">Delete</button>
                    </form>

                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="sm:max-w-full lg:max-w-md">
        <a href="" class="flex items-center mb-2 pb-2 border-b border-gray-300 mt-4 lg:mt-0">
            <x-profile-image>
                {{ $photo->user->image }}
            </x-profile-image>
            <p class="font-semibold ml-2">{{ $photo->user->name }}</p>
        </a>

        <div class="h-screen pb-64 overflow-y-auto scrollbar-hide">
            @foreach($comments as $comment)
            <div class="h-max relative bg-white border border-gray-300 rounded-lg p-2 mb-4 shadow-md">
                <div>
                    <a href="" class="inline-flex items-baseline">
                        <x-profile-image class="self-center mx-1">
                            {{ $comment->user->image }}
                        </x-profile-image>
                        <span class="font-semibold mt-2">{{ $comment->user->name }}</span>
                    </a>
                    {{ $comment->text }}
                </div>
                @if(Auth::user()->id == $comment->user->id)
                <button id="dropdownMenuIconButton" data-dropdown-toggle="{{ $comment->id }}" class="absolute right-2 top-4">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01" />
                    </svg>
                </button>

                <div id="{{ $comment->id }}" class="w-max hidden bg-red-600 hover:bg-red-700 hover:cursor-pointer p-1 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                            </svg>
                        </button>
                    </form>
                </div>
                @endif

            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection