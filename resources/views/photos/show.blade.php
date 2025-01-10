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
                    <button data-modal-target="{{ $photo->id }}" data-modal-toggle="{{ $photo->id }}" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-4 py-2">Delete</button>
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

<div id="{{ $photo->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $photo->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this photo?</h3>
                <form action="{{ route('photos.destroy', $photo->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-modal-hide="{{ $photo->id }}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="{{ $photo->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection