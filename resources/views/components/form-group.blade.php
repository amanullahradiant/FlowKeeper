<!-- resources/views/components/form-group.blade.php -->
@props(['label', 'name'])

<div class="form-group mb-3">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
    {{ $slot }}
</div>
