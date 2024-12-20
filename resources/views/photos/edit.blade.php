@extends('layout')

@section('title')
{{ __('Edit Photo') }}
@endsection

@section('content')

<form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium">Photo Title</label>
        <input type="text" name="title" id="title" value="{{ $photo->title }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm" required>
    </div>
    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-4 py-2">Update</button>
</form>

@endsection