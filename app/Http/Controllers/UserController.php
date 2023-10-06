<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Login;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->orderByLastLogin()
            ->withLastLogin()
            ->paginate();

        return view('users', ['users' => $users]);
    }
}
