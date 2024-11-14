<!-- resources/views/tasks/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-5">
        <h1 class="text-2xl font-bold text-blue-600 mb-6">Task Details</h1>

        <x-form-card>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Title</h2>
                <p class="text-gray-800">{{ $task->title }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Description</h2>
                <p class="text-gray-800">{{ $task->description }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Due Date</h2>
                <p class="text-gray-800">{{ $task->due_date }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Priority</h2>
                <p class="text-gray-800 capitalize">{{ $task->priority }}</p>
            </div>

            <div class="flex justify-end space-x-3">
                <x-secondary-button :href="route('tasks.index')">Back to List</x-secondary-button>
                <x-primary-button :href="route('tasks.edit', $task->id)">Edit Task</x-primary-button>
            </div>
        </x-form-card>
    </div>
@endsection

