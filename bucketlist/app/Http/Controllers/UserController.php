<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UsersRequest;

class UserController extends Controller
{
    public function showProfEditForm(int $user_id)
    {
        $user = User::find($user_id);
        
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function edit(int $user_id, UsersRequest $request)
    {
        $user = User::find($user_id);

        $user->name = $request->name;
        $user->comment = $request->comment;
        
        // もし画像があれば更新
        if ($request->image) {
            $user->image = $request->image->storeAs('public/images', Auth::id() . '.jpg');
        }
       
        $user->save();

        return redirect()->route('tasks.index', [
            'user_id' => $user_id,
        ]);
    }
}
