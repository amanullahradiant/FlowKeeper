@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Task List</h1>

            <!-- Primary Button Component for 'Create Task' -->
            <x-primary-button :href="route('tasks.create')">Create Task</x-primary-button>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <x-alert type="success" class="mb-4">{{ session('success') }}</x-alert>
        @endif

        <!-- Task Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead style="background-color: #e3f2fd; color: #0d6efd;">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Priority</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->due_date}}</td>
                            <td>{{ ucfirst($task->priority) }}</td>
                            <td class="text-center">
                                <!-- Action Buttons -->
                                <x-secondary-button :href="route('tasks.edit', $task->id)" class="btn-sm">Edit</x-secondary-button>

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" 
                                      onsubmit="return confirm('Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit" class="btn-sm">Delete</x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No tasks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
