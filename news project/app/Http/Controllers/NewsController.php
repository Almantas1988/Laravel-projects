<?php

namespace App\Http\Controllers;

use App\Category;
use App\NewsCategories;
use App\NewsItem;
use App\NewsPhoto;
use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        //
        $news = NewsItem::all();

        $news = NewsItem::orderBy('id')->paginate(5);

        return view('news.index', compact('news'));

    }

    public function create()
    {
        //
        $categories = Category::all();

        return view('news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //

        $newsItem = new NewsItem();
        $newsItem->title = $request->input('title');
        $newsItem->content = $request->input('content');
        $newsItem->main_image = 'none';

        $newsItem->user_id = Auth::user()->id;


        if ($request->file('photo')) {

            $photo = $request->file('photo');

            $filename = time() . $photo->getClientOriginalName();

            $path = $photo->storeAs('news_items', $filename);

            $newsItem->main_image = 'storage/' . $path;
        }


        $newsItem->save();

        $newsCat = new NewsCategories();
        $newsCat->news_id = $newsItem->id;
        $newsCat->category_id = $request->input('category');
        $newsCat->save();

        session()->flash('message', 'Naujiena sekmingai prideta');


        return redirect()->route('news.index');
    }


    public function show($id)
    {
        $newsItem = NewsItem::findOrFail($id);

        return view('news.show', compact(['newsItem']));
    }


    public function edit($id)
    {
        $newsItem = NewsItem::find($id);

        return view('news.edit', compact('newsItem'));
    }


    public function update(Request $request, $id)
    {
        $newsitem = NewsItem::find($id);

        $newsitem->title = $request->input('title');
        $newsitem->content = $request->input('content');

        $newsitem->save();

        session()->flash('message', 'Naujiena sekmingai paredaguota');

        return redirect()->route('news.index', $newsitem->id);
    }

    public function destroy($id)
    {
        $newsItem = NewsItem::find($id);
        $newsItem->delete();

        session()->flash('message', 'Naujiena sekmingai istrinta');

        return redirect()->route('news.index');
    }

    public function authorIndex($id)
    {
        $user = User::find($id);

        return view('news.author', compact('user'));
    }
}
