<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Genre;
use App\Http\Requests;
use App\Http\Requests\BookRequest;
use Auth;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('owner', ['only' => ['edit', 'delete']]);
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
     * @param Book $book
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Book $book)
    {

        return view('books.show', compact('book'));
    }

    /**
     * Добавить
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $genres = Genre::lists('name', 'id');
        $authors = Author::lists('name', 'id');

        return view('books.create', compact('genres', 'authors'));
    }

    /**
     * Сохранить
     *
     * @param BookRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BookRequest $request)
    {
        $this->createBook($request);

        session()->flash('flash_message', 'Книга добавлена в библиотеку.');

        return redirect('books');
    }

    /**
     * Редактировать
     * 
     * @param Book $book
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Book $book)
    {
        $genres = Genre::lists('name', 'id');
        $authors = Author::lists('name', 'id');

        return view('books.edit', compact('book', 'genres', 'authors'));
    }

    /**
     * Внести изменения
     *
     * @param Book $book
     * @param BookRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->all());

        if($request->input('genre_list')) {
            $this->syncGenres($book, $request->input('genre_list'));
        }
        if($request->input('author_list')) {
            $this->syncAuthors($book, $request->input('author_list'));
        }

        return redirect('books');
    }


    /**
     * Удалить
     *
     * @param Book $book
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('books');
    }

    /**
     * Синхронизация жанров в БД
     *
     * @param Book $book
     * @param array $genres
     */
    public function syncGenres(Book $book, array $genres)
    {
        $book->genres()->sync($genres);
    }

    /**
     * Синхронизация авторов в БД
     *
     * @param Book $book
     * @param array $authors
     */
    public function syncAuthors(Book $book, array $authors)
    {
        $book->authors()->sync($authors);
    }

    /**
     * Сохранить новую книгу
     *
     * @param BookRequest $request
     *
     * @return mixed
     */
    private function createBook(BookRequest $request)
    {

        $book = Auth::user()->books()->create($request->all());

        if($request->input('genre_list')) {
            $this->syncGenres($book, $request->input('genre_list'));
        }
        if($request->input('author_list')) {
            $this->syncAuthors($book, $request->input('author_list'));
        }
        
        return $book;
    }
}
