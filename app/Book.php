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
        'user_id', 'title', 'description', 'published_at'
    ];

    public function scopeCreated($query)
    {
        $query->where('created_at', '<=', Carbon::now());
    }

    /**
     * Пользователь владеет книгой
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Автор владеет книгой
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function authors()
    {
        return $this->belongsToMany('App\Author')->withTimestamps();
    }

    /**
     * Может принадлежать множествам жанров
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genres()
    {
        return $this->belongsToMany('App\Genre')->withTimestamps();
    }

    /**
     * Может принадлежать множествам рецензий
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    /**
     * @return array
     */
    public function getGenreListAttribute()
    {
        return $this->genres->lists('name');
    }


    public function isOwner(User $user)
    {
        return ($this->user_id === $user->id);
    }
}
