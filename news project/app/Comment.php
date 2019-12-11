<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "comments";

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function newsItem() {
        return $this->hasOne('App\NewsItem', 'id', 'news_id');
    }
}
