<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests;
use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Вывод всех авторов
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $authors = Author::latest()->get();

        return view('authors.index', compact('authors'));
    }

    /**
     *
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $author = Author::findOrFail($id);

        return view('authors.show', compact('author'));
    }

    /**
     * Добавить
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Сохранить
     *
     * @param AuthorRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AuthorRequest $request)
    {

        $this->createAuthor($request);

        session()->flash('flash_message', 'Автор добавлен.');

        return redirect('authors');
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
        $author = Author::findOrFail($id);

        return view('authors.edit', compact('author'));
    }

    /**
     * Внести изменения
     * 
     * @param $id
     * @param AuthorRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, AuthorRequest $request)
    {
        $author = Author::findOrFail($id);

        $author->update($request->all());
        
        session()->flash('flash_message', 'Информация изменена.');

        return redirect('authors');
    }

    /**
     * Удалить
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        $author->delete();

        return redirect('authors');
    }

    /**
     * Сохранить новую книгу
     *
     * @param AuthorRequest $request
     *
     * @return mixed
     */
    private function createAuthor(AuthorRequest $request)
    {
        $author = Auth::user()->authors()->create($request->all());

        return $author;

    }
}
