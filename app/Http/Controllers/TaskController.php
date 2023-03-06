<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('category', 'user')->latest()->paginate();

        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        $categories = Category::pluck('name', 'id');

        return view('tasks.create', compact('categories'));
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        Task::create($request->validated());

        return to_route('tasks.index');
    }

    public function edit(Task $task): View
    {
        $categories = Category::pluck('name', 'id');

        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        $task->update($request->validated());

        return to_route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return to_route('tasks.index');
    }
}
