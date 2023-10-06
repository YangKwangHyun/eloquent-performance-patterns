<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->paginate();

        return view('users', ['users' => $users]);
    }
}
