<!-- resources/views/components/form-textarea.blade.php -->
@props(['name'])

<textarea name="{{ $name }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" {{ $attributes }}>{{ $slot }}</textarea>
