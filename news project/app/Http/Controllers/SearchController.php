<?php

namespace App\Http\Controllers;

use App\NewsItem;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request) {

       $search =  $request->input('search');

        if(strlen($search) < 3) {
            session()->flash('message', 'Iveskite bent 3 simbolius');
            return redirect()->back();
        }

        $news = NewsItem::where('title', 'LIKE', '%' . $search . '%' )
                          ->orWhere('content', 'LIKE', '%' . $search . '%' )
                          ->paginate(3);


        return view('news.index', compact(['news', 'search']));
    }
}
