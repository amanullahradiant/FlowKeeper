<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-5">
        <h1 class="text-2xl font-bold text-blue-600 mb-6">Edit Task</h1>
        
        <x-form-card>
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <x-form-group label="Title" name="title">
                    <x-form-input name="title" value="{{ old('title', $task->title) }}" required />
                </x-form-group>
                
                <x-form-group label="Description" name="description">
                    <x-form-textarea name="description">{{ old('description', $task->description) }}</x-form-textarea>
                </x-form-group>
                
                <x-form-group label="Due Date" name="due_date">
                    <x-form-input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}" />
                </x-form-group>

                <x-form-group label="Follow Up Date" name="follow_up_date">
                    <x-form-input type="date" name="follow_up_date" value="{{ old('follow_up_date', $task->follow_up_date) }}" />
                </x-form-group>
                
                <x-form-group label="Priority" name="priority">
                    <x-form-select name="priority">
                        <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>High</option>
                    </x-form-select>
                </x-form-group>
                
                <div class="flex justify-end space-x-3">
                    <x-secondary-button :href="route('tasks.index')">Cancel</x-secondary-button>
                    <x-primary-button type="submit">Update Task</x-primary-button>
                </div>
            </form>
        </x-form-card>
    </div>
@endsection
