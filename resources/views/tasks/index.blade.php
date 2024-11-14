
@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-5">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-blue-600">Task List</h1>
            <x-primary-button :href="route('tasks.create')">Create Task</x-primary-button>
        </div>

        @if (session('success'))
            <x-alert type="success" class="mb-6">{{ session('success') }}</x-alert>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-blue-100 text-blue-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Title</th>
                        <th class="py-3 px-6 text-left">Description</th>
                        <th class="py-3 px-6 text-left">Due Date</th>
                        <th class="py-3 px-6 text-left">Priority</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @forelse ($tasks as $task)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6">{{ $task->title }}</td>
                            <td class="py-3 px-6">{{ $task->description }}</td>
                            <td class="py-3 px-6">{{ $task->due_date }}</td>
                            <td class="py-3 px-6">{{ ucfirst($task->priority) }}</td>
                            <td class="py-3 px-6 text-center flex space-x-2 justify-center">
                                <x-secondary-button :href="route('tasks.show', $task->id)" class="px-2">Show</x-secondary-button>
                                <x-secondary-button :href="route('tasks.edit', $task->id)" class="px-2">Edit</x-secondary-button>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit" class="px-2">Delete</x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-gray-500 py-4">No tasks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

