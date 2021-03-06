<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Task;
use App\Http\Requests\UsersRequest;
use Gates;

class UserController extends Controller
{
    public function showProfEditForm(User $user)
    {
        // $user = User::findOrFail($user);
        if (Auth::user()->id !== $user->id) {
            abort(403);
        }

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function edit(User $user, Task $task, UsersRequest $request)
    {
        // $user = User::findOrFail($user);
        $user->name = $request->name;
        $user->comment = $request->comment;
        
        // もし画像があれば更新
        if ($request->image) {
            $user->image = $request->image->storeAs('public/images', Auth::id() . '.jpg');
        }
       
        $user->save();

        return redirect()->route('tasks.index', [
            'user' => $user,
        ]);
    }
}
