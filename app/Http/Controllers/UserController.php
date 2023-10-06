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
            ->orderBy(Company::select('name')
                ->whereColumn('user_id', 'users.id')
                ->orderBy('name')
                ->take(1)
            )
            ->with('company')
            ->paginate();

        return view('users', ['users' => $users]);
    }
}
