<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }
    public function register_form()
    {
        return view('auth.register');
    }
    public function update_role(Request $request)
    {
        $id = Auth::id();
        if($id == $request->id)
            return response()->json(['status' => false]);


        $user = User::find($request->id);
        if($user->role == 'admin')
        {
            $user->role = 'user';
        }
        else
        {
            $user->role = 'admin';
        }
        $user->save();

        return response()->json($user->role);
    }
}
