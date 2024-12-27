<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xs md:max-w-4xl grid md:grid-cols-3 mx-auto gap-6 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div class="grid text-5xl font-semibold">
                            60
                            <span class="text-base text-gray-500 font-light">Total Photos</span>
                        </div>
                        <svg class="w-20 h-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path d="M25.65 4H6.35A4.35 4.35 0 0 0 2 8.35v15.3A4.35 4.35 0 0 0 6.35 28h19.3A4.35 4.35 0 0 0 30 23.65V8.35A4.35 4.35 0 0 0 25.65 4zM28 23.65A2.36 2.36 0 0 1 25.65 26H6.35A2.36 2.36 0 0 1 4 23.65V8.35A2.36 2.36 0 0 1 6.35 6h19.3A2.36 2.36 0 0 1 28 8.35z" />
                            <path d="M21.53 12.85a2.21 2.21 0 0 0-4-.12l-4.37 8.32-.9-1.33a2.19 2.19 0 0 0-3.46-.24l-2.54 2.85a1 1 0 1 0 1.48 1.34l2.57-2.86a.18.18 0 0 1 .17-.06.18.18 0 0 1 .15.09l1.84 2.72a1 1 0 0 0 .88.44 1 1 0 0 0 .84-.54l5.15-9.8a.18.18 0 0 1 .18-.11.17.17 0 0 1 .18.12l4.39 9.74A1 1 0 0 0 25 24a1 1 0 0 0 .41-.09 1 1 0 0 0 .5-1.32zM10 16a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm0-6a2 2 0 1 1-2 2 2 2 0 0 1 2-2z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div class="grid text-5xl font-semibold">
                            1460
                            <span class="text-base text-gray-500 font-light">Total Comments</span>
                        </div>
                        <svg class="w-20 h-20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div class="grid text-5xl font-semibold">
                            560
                            <span class="text-base text-gray-500 font-light">Total Votes</span>
                        </div>
                        <svg class="w-20 h-20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M11 9H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h6m0-6v6m0-6 5.419-3.87A1 1 0 0 1 18 5.942v12.114a1 1 0 0 1-1.581.814L11 15m7 0a3 3 0 0 0 0-6M6 15h3v5H6v-5Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>