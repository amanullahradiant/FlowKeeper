<!-- resources/views/components/form-input.blade.php -->
@props(['type' => 'text', 'name', 'value' => ''])

<input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" {{ $attributes }} />
