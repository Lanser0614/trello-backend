<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all()->toArray());
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::query()->create($request->validated());

        return response()->json([
            'status' => (bool)$task,
            'data' => $task,
            'message' => $task ? 'Task Created!' : 'Error Creating Task'
        ]);
    }

    public function show(Task $task)
    {
        return response()->json($task);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $status = $task->update(
           $request->validated()
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Task Updated!' : 'Error Updating Task'
        ]);
    }

    public function destroy(Task $task)
    {
        $status = $task->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Task Deleted!' : 'Error Deleting Task'
        ]);
    }
}
