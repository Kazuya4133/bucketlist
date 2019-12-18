<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;

// 自作
class UserController extends Controller
{
    public function showProfEditForm(int $user_id)
    {
        $user = User::find($user_id);
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function edit(int $user_id, Request $request)
    {
        $user = User::find($user_id);

        $user->name = $request->name;
        $user->comment = $request->comment;
        $user->image = $request->image;
        $user->save();

        return redirect()->route('tasks.index', [
            'user_id' => $user_id,
        ]);
    }
}
