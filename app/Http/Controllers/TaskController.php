<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::get(); // Get all tasks including soft-deleted tasks
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'due_date' => 'required|date',
            'follow_up_date' => 'nullable|date|after_or_equal:due_date',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
        ]);

        $task = new Task($validated);
        $task->user_id = auth()->id();
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'due_date' => 'required|date',
            'follow_up_date' => 'nullable|date|after_or_equal:due_date',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function followUp(Task $task)
    {
        $task->follow_up_date = now()->addDay(); // Example: add 1 day for follow-up
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task follow-up date set.');
    }

    public function destroy(Task $task)
    {
        $task->delete(); // Soft delete the task

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function restore($id)
    {
        $task = Task::withTrashed()->findOrFail($id);
        $task->restore(); // Restore the soft-deleted task

        return redirect()->route('tasks.index')->with('success', 'Task restored successfully.');
    }
}
