<!-- resources/views/tasks/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-primary mb-4">Create New Task</h1>
    
    <x-form-card>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            
            <!-- Title Input -->
            <x-form-group label="Title" name="title">
                <x-form-input name="title" value="{{ old('title') }}" required />
            </x-form-group>
            
            <!-- Description Input -->
            <x-form-group label="Description" name="description">
                <x-form-textarea name="description">{{ old('description') }}</x-form-textarea>
            </x-form-group>
            
            <!-- Due Date Input -->
            <x-form-group label="Due Date" name="due_date">
                <x-form-input type="date" name="due_date" value="{{ old('due_date') }}" />
            </x-form-group>
            
            <!-- Priority Dropdown -->
            <x-form-group label="Priority" name="priority">
                <x-form-select name="priority">
                    <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                </x-form-select>
            </x-form-group>
            
            <!-- Submit Button -->
            <x-primary-button type="submit">Save Task</x-primary-button>
            <x-secondary-button :href="route('tasks.index')">Cancel</x-secondary-button>
        </form>
    </x-form-card>
</div>
@endsection
