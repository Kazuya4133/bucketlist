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
    public function index(User $user)
    {
        $tasks = Auth::user()->tasks()->get();

        $data = [
            'tasks' => $tasks,
            'user' => $user->id,
            'image' => str_replace('public', 'storage', Auth::user()->image)];

        return view('tasks.index', $data);
    }

    public function showCreateForm(User $user)
    {
        return view('tasks.create', [
            'user' => $user->id,
        ]);
    }

    public function create(User $user, CreateTask $request)
    {
        // 削除する
        // $user = User::findOrFail($user);

        $task = new Task();
        $task->title = $request->title;
        $user->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'user' => $user->id,
        ]);
    }

    public function showEditForm(User $user, Task $task)
    {
        // 削除する
        // $task = Task::findOrFail($task);
        return view('tasks.edit', [
            'user' => $user,
            'task' => $task,
        ]);
    }

    public function edit(User $user, Task $task, EditTask $request)
    {
        // 削除する
        // $task = Task::findOrFail($task);

        $task->title = $request->title;
        $task->status = $request->status;
        if ($request->achieved_date) {
            $task->achieved_date = $request->achieved_date;
        }
        
        $task->save();

        return redirect()->route('tasks.index', [
            'user' => $user,
        ]);
    }

    public function showDeleteForm(User $user, Task $task)
    {
        // 削除する
        // $task = Task::findOrFail($task);
        return view('tasks.delete', [
            'user' => $user,
            'task' => $task,
        ]);
    }

    public function remove(User $user, Task $task, Request $request)
    {
        // 削除する
        // Task::findOrFail($task)->delete();
        $task->delete();
        return redirect()->route('tasks.index', [
            'user' => $user,
        ]);
    }
    
}
