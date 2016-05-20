<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests;
use Illuminate\Support\Facades\Request;

class BooksController extends Controller
{

    public function index()
    {
        $books = Book::latest()->get();

        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }

    public function add()
    {
        return view('books.add');
    }

    public function store()
    {
        $input = Request::all();

        Book::create($input);

        return redirect('books');
    }
}
