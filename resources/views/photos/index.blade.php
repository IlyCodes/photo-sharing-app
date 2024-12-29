@extends('layout')

@php
$title = 'title';
@endphp

@section('content')

<div class="md:fixed md:inset-24 flex justify-center">
    <div class="posts h-screen grid justify-center gap-y-6 overflow-y-auto pb-48 scrollbar-hide">
        @foreach ($photos as $photo)
        <div id="photo-{{ $photo->id }}">
            <a href="" class="flex items-center mb-2">
                <x-profile-image>
                    {{ $photo->user->image }}
                </x-profile-image>
                <p class="font-semibold ml-2">{{ $photo->user->name }}</p>
            </a>
            <div class="h-max bg-white rounded-lg shadow-lg border border-gray-300">
                <img src="{{ asset($photo->image_path) }}" alt="{{ $photo->title }}" class="w-[500px] h-[400px] bg-black object-contain rounded-t-lg">
                <div class="p-2">
                    <h3 class="text-xl font-semibold">{{ $photo->title }}</h3>
                    @auth
                    <div class="mt-2 flex items-center space-x-2">
                        <form class="voteForm flex items-center space-x-2">
                            @csrf
                            <button type="button" value="up" data-photo_id="{{ $photo->id }}" data-clicked="{{ $photo->isUpvoted ? 'true' : 'false' }}" class="vote-btn">
                                <svg id="upvote-{{ $photo->id }}" class="w-7 h-7 hover:bg-spec-green/25 hover:p-2 rounded-full transition duration-300 ease-in-out" fill="{{ $photo->isUpvoted ? '#00a313' : 'none' }}" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#00a313">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M4 14h4v7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7h4a1.001 1.001 0 0 0 .781-1.625l-8-10c-.381-.475-1.181-.475-1.562 0l-8 10A1.001 1.001 0 0 0 4 14z"></path>
                                    </g>
                                </svg>
                            </button>
                            <p class="counter text-base font-semibold text-spec-green" data-value="{{ $photo->count_upvotes }}">
                                {{ $photo->count_upvotes }}
                            </p>
                            <button type="button" value="down" data-photo_id="{{ $photo->id }}" data-clicked="{{ $photo->isDownvoted ? 'true' : 'false' }}" class="vote-btn">
                                <svg id="downvote-{{ $photo->id }}" class="w-7 h-7 hover:bg-spec-red/25 hover:p-2 rounded-full transition duration-300 ease-in-out" fill="{{ $photo->isDownvoted ? '#fb4141' : 'none' }}" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#fb4141">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M20.901 10.566A1.001 1.001 0 0 0 20 10h-4V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v7H4a1.001 1.001 0 0 0-.781 1.625l8 10a1 1 0 0 0 1.562 0l8-10c.24-.301.286-.712.12-1.059z"></path>
                                    </g>
                                </svg>
                            </button>
                        </form>
                        <button type="button" data-collapse-toggle="{{ $photo->id }}">
                            <svg class="w-8 h-8 ml-2 hover:bg-gray-300 hover:p-2 rounded-full transition duration-300 ease-in-out" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                            </svg>
                        </button>
                    </div>
                    @else
                    <div class="mt-2 flex items-center space-x-2">
                        <form action="{{ route('login') }}" class="voteForm flex items-center space-x-2 hover:blur-[2px]">
                            <button type="submit">
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#00a313">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M4 14h4v7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7h4a1.001 1.001 0 0 0 .781-1.625l-8-10c-.381-.475-1.181-.475-1.562 0l-8 10A1.001 1.001 0 0 0 4 14z"></path>
                                    </g>
                                </svg>
                            </button>

                            <button type="submit">
                                <svg class="w-7 h-7" fill='none' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#fb4141">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M20.901 10.566A1.001 1.001 0 0 0 20 10h-4V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v7H4a1.001 1.001 0 0 0-.781 1.625l8 10a1 1 0 0 0 1.562 0l8-10c.24-.301.286-.712.12-1.059z"></path>
                                    </g>
                                </svg>
                            </button>

                            <button type="submit">
                                <svg class="w-8 h-8 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    @endauth
                    <div id="{{ $photo->id }}" class="hidden">
                        <form action="{{ route('comments.store', $photo->id) }}" method="post">
                            @csrf
                            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                                <button type="button" class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z" />
                                    </svg>
                                    <span class="sr-only">Add emoji</span>
                                </button>
                                <textarea id="chat" name="comment" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add a comment..."></textarea>
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
                        <a href="{{ route('photos.show', $photo->id) }}" class="text-gray-600">
                            @if($photo->comments->count() > 1)
                            {{'View all ' . $photo->comments->count() . ' comments'}}
                            @elseif($photo->comments->count() == 1)
                            {{'View comment'}}
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection