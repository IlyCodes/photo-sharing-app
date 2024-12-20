<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl grid grid-cols-3 mx-auto gap-x-6 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div class="grid text-5xl font-semibold">
                            60
                            <span class="text-base text-gray-500 font-light">Total Photos</span>
                        </div>
                        <img class="w-[40%] h-[40%]" src="{{ asset('logo/logo.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div class="grid text-5xl font-semibold">
                            1460
                            <span class="text-base text-gray-500 font-light">Total Comments</span>
                        </div>
                        <img class="w-[40%] h-[40%]" src="{{ asset('logo/logo.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div class="grid text-5xl font-semibold">
                            560
                            <span class="text-base text-gray-500 font-light">Total Votes</span>
                        </div>
                        <img class="w-[40%] h-[40%]" src="{{ asset('logo/logo.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>