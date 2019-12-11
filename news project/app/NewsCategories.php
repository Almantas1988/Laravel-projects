<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategories extends Model
{
    //
    public function category() {

        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function newsItem() {

        return $this->hasOne('App\NewsItem', 'id', 'news_id');
    }

}
