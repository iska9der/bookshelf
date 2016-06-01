<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'genre_id', 'title', 'description', 'published_at'
    ];

    public function scopeCreated($query)
    {
        $query->where('created_at', '<=', Carbon::now());
    }
}
