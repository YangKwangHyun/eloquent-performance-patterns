<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->search(request('search'))
            ->with('company')
            ->paginate();

        return view('users', ['users' => $users]);
    }
}
