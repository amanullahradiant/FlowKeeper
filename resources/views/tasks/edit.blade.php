<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Task</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title) }}"
                    required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $task->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control"
                    value="{{ old('due_date', $task->due_date) }}">
            </div>
            <div class="form-group">
                <label for="follow_up_date">Follow-up Date</label>
                <input type="date" name="follow_up_date" id="follow_up_date" class="form-control"
                    value="{{ old('follow_up_date', $task->follow_up_date) }}">
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <select name="priority" id="priority" class="form-control">
                    <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Medium
                    </option>
                    <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>High</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
@endsection
