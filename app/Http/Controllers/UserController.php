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
            ->when(request('sort') === 'town', function ($query) {
                $direction = strtolower(request('direction')) === 'asc' ? 'asc' : 'desc';

                $query
                    ->orderByNullsLast('town', $direction);
            })
            ->orderBy('name')
            ->paginate();

        return view('users', ['users' => $users]);
    }
}
