<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     /**
     * Get the user it belongs to.
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the bookmarks for this tag.
     */
    public function tagBookmarks()
    {
        return $this->belongsToMany('App\Bookmark')->withTimestamps();;
    }
}
