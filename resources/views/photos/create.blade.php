@extends('layout')

@section('title')
{{ __('Upload a New Photo') }}
@endsection

@section('content')

<form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium">Photo Title</label>
        <input type="text" name="title" id="title" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm">
        <x-input-error :messages="$errors->get('title')" />
    </div>
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium">Upload Image</label>
        <input type="file" name="image" id="image" class="mt-1 block w-full" required>
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>
    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-4 py-2">Upload</button>
</form>

@endsection