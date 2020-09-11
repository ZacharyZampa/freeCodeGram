<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function index() {
        // get all user ids that exist in the application
        $users = User::all();

        return view('auth.userAdmin', compact('users'));
    }

    public function role(User $user, Request $request) {
        // edit role of user
        $role = $request->role;
        if (is_null($role)) {
            return response()->json("general");
        }

        $user->update(
            ['role' => $role]
        );

        return response()->json($role);
    }
}
