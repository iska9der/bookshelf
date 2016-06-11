<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Http\Requests\GenreRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class GenresController extends Controller
{

    /**
     * Вывод всех объектов
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $genres = Genre::latest()->get();

        return view('genres.index', compact('genres'));
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
        $genre = Genre::findOrFail($id);

        return view('genres.show', compact('genre'));
    }

    /**
     * Добавить
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Сохранить
     *
     * @param GenreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(GenreRequest $request)
    {

        Genre::create($request->all());

        return redirect('genres');
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
        $genre = Genre::findOrFail($id);

        return view('genres.edit', compact('genre'));
    }

    /**
     * Внести изменения
     *
     * @param $id
     * @param GenreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, GenreRequest $request)
    {
        $genre = Genre::findOrFail($id);

        $genre->update($request->all());

        return redirect('genres');
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
        $genre = Genre::findOrFail($id);

        $genre->delete();

        return redirect('books');
    }
}
