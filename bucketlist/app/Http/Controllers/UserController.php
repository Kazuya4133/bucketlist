<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Storage;
use App\Http\Requests\UsersRequest;

class UserController extends Controller
{
    public function showProfEditForm(int $user_id)
    {
        $user = User::find($user_id);
        
        $is_image = false;
        if (Storage::disk('local')->exists('public/images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }

        return view('users.edit', [
            'user' => $user,
            'is_image' => $is_image,
        ]);
    }

    public function edit(int $user_id, Request $request)
    {
        $user = User::find($user_id);

        $user->name = $request->name;
        $user->comment = $request->comment;
        
        if (!empty($request->image)) {
            $request->image->storeAs('public/images', Auth::id() . '.jpg');
        }

        $user->save();

        return redirect()->route('tasks.index', [
            'user_id' => $user_id,
        ]);
    }
}
