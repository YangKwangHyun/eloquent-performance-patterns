<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Checkout;
use App\Models\User;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::query()
            ->with('user')
            ->orderByRaw('user_id is null')
            ->orderBy('name')
            ->paginate();

        return view('books', ['books' => $books]);
    }
}
