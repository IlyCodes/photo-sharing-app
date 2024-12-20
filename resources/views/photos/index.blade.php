@extends('layout')

@php
$title = 'title';
@endphp

@section('content')

<div class="md:fixed md:inset-24 flex justify-center">
    <div class="h-screen grid justify-center gap-y-6 overflow-y-auto pb-48 scrollbar-hide">
        @foreach ($photos as $photo)
        <div>
            <a href="" class="flex items-center mb-2">
                <img src="{{ asset('imgs/dog.jpg') }}" alt="user_photo" class="w-10 h-10 bg-white rounded-full border border-gray-800 shadow-lg">
                <p class="font-semibold ml-2">{{ $photo->user->name }}</p>
            </a>
            <div class="h-max bg-white rounded-lg shadow-lg border border-gray-300">
                <img src="{{ asset($photo->image_path) }}" alt="{{ $photo->title }}" class="w-[100%] rounded-t-lg">
                <div class="p-2">
                    <h3 class="text-xl font-semibold">{{ $photo->title }}</h3>
                    <div class="mt-2 flex items-center space-x-2">
                        <button>
                            <svg class="w-9 h-9 text-gray-800 hover:text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.881 16H7.119a1 1 0 0 1-.772-1.636l4.881-5.927a1 1 0 0 1 1.544 0l4.88 5.927a1 1 0 0 1-.77 1.636Z" />
                            </svg>
                        </button>
                        <button>
                            <svg class="w-9 h-9 text-gray-800 hover:text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.119 8h9.762a1 1 0 0 1 .772 1.636l-4.881 5.927a1 1 0 0 1-1.544 0l-4.88-5.927A1 1 0 0 1 7.118 8Z" />
                            </svg>
                        </button>
                        <button type="button" data-collapse-toggle="input-container">
                            <svg class="w-8 h-8 ml-2 text-gray-800 hover:text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                            </svg>
                        </button>
                    </div>
                    <div id="input-container" class="hidden">
                        <form>
                            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                                <button type="button" class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z" />
                                    </svg>
                                    <span class="sr-only">Add emoji</span>
                                </button>
                                <textarea id="chat" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add a comment..."></textarea>
                                <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                                    </svg>
                                    <span class="sr-only">Send message</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <p class="text-base font-semibold">380 votes</p>
                        <a href="{{ route('photos.show', $photo->id) }}" class="text-gray-600">View all 108 comments</a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>

@endsection