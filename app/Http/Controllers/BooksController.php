<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests;
use App\Http\Requests\BookRequest;
use Auth;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Вывод всех объектов
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $books = Book::latest()->created()->get();

        return view('books.index', compact('books'));
    }

    /**
     * Вывод одного объекта
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
     * Добавить
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Сохранить
     *
     * @param AddBookRequest|BookRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BookRequest $request)
    {

        $book = new Book($request->all());

        Auth::user()->books()->save($book);

        return redirect('books');
    }

    /**
     * Редактировать
     * 
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    /**
     * Внести изменения
     *
     * @param $id
     * @param BookRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, BookRequest $request)
    {
        $book = Book::findOrFail($id);

        $book->update($request->all());

        return redirect('books');
    }

    /**
     * Удалить
     *
     * @param $id
     * @param BookRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect('books');
    }
}
