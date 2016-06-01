<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    /**
     * Вывод всех книг
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $books = Book::latest()->created()->get();

        return view('books.index', compact('books'));
    }

    /**
     * Вывод книги
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }

    /**
     * Добавить книгу
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Сохранить новую книгу
     *
     * @param AddBookRequest|BookRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BookRequest $request)
    {
        Book::create($request->all());

        return redirect('books');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    public function update($id, BookRequest $request)
    {
        $book = Book::findOrFail($id);

        $book->update($request->all());

        return redirect('books');
    }
}
