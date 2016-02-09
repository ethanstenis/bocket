<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
     /**
     * Get the user it belongs to.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Get the tags for this bookmark.
     */
    public function bookmarkTags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
