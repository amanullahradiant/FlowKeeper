<!-- resources/views/tasks/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $task->title }}</h1>
    <p><strong>Description:</strong> {{ $task->description }}</p>
    <p><strong>Due Date:</strong> {{ $task->due_date }}</p>
    <p><strong>Priority:</strong> {{ ucfirst($task->priority) }}</p>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Tasks</a>
</div>
@endsection
