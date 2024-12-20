<x-app-layout>

    @if(!isset($title))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @yield('title')
        </h2>
    </x-slot>
    @endif
    <h2>{{ Session::get('success') ? Session::get('success') : '' }}</h2>

    <div>
        <div class="container mx-auto p-6">
            @yield('content')
        </div>
    </div>
</x-app-layout>