<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Login;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // join이 orderBy(Comapany~)보다 속도가 빠름.

        $users = User::query()
            ->select('users.*')
            ->join('companies', 'companies.id', '=', 'users.company_id')
            ->orderBy('companies.name')
            ->with('company')
            ->paginate();

        // $users = User::query()
        //     ->orderBy(Company::select('name')
        //         ->whereColumn('id','users.company_id')
        //         ->orderBy('name')
        //         ->take(1)
        //     )
        //     ->with('company')
        //     ->paginate();

        return view('users', ['users' => $users]);
    }
}
