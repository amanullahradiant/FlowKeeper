<!-- resources/views/components/form-select.blade.php -->
@props(['name'])

<select name="{{ $name }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" {{ $attributes }}>
    {{ $slot }}
</select>
