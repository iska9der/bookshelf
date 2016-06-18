<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\Review;
use App\Http\Requests;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth', ['except' => ['index', 'show']]);
//        $this->middleware('owner', ['only' => ['edit', 'delete']]);
    }


    /**
     * Вывод всех объектов
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex($id)
    {
        $book = Book::find($id);

        $reviews = $book->reviews()->latest()->get();

        return view('books.reviews.index', compact('book', 'reviews'));
    }

    /**
     * Сохранить
     *
     * @param ReviewRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postReview(ReviewRequest $request)
    {

        Auth::user()->reviews()->create($request->all());

        session()->flash('flash_message', 'Рецензия добавлена.');

        return redirect('books');
    }

}
