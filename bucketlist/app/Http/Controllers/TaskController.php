<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditTask;

class TaskController extends Controller
{
    public function index(int $user_id)
    {
        // すべてのタスクを取得
        $tasks = Auth::user()->tasks()->get();

        return view('tasks.index', [
            'tasks' => $tasks,
            'user_id' => $user_id,
        ]);
    }

    public function showCreateForm(int $user_id)
    {
        return view('tasks/create', [
            'user_id' => $user_id
        ]);
    }

    public function create(int $user_id, CreateTask $request)
    {
        $user = Task::findOrFail($user_id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $user->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $user->id,
        ]);
    }

    public function showEditForm(int $user_id, int $task_id)
    {
        $task = Task::find($task_id);

        return view('tasks.edit', [
            'task' =>$task,
        ]);
    }

    public function edit(int $user_id, int $task_id, EditTask $request)
    {
        $task = Task::find($task_id);

        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index', [
            'user_id' => $task->user_id,
        ]);
    }

    
}
