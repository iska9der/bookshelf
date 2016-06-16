<?php

namespace App\Http\Middleware;

use Closure;
use App\Book;

class RedirectIfNotOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $book = Book::findOrFail($request->segments()[1]);

        if ($request->user()->isAdmin()) {
            return $next($request);
        }

        if (! $book->isOwner($request->user())) {
            return redirect('/');
        }

        return $next($request);
    }
}
