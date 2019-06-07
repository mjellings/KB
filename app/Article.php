<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * Get the User for the Article.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the Categories for the Article.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    /**
     * Get the Tags for the Article.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}