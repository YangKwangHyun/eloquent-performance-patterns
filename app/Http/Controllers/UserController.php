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
            ->whereBirthdayThisWeek()
            ->orderByBirthday()
            ->orderBy('name')
            ->paginate();

        return view('users', ['users' => $users]);
    }
}
