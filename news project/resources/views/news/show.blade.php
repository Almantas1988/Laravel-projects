@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div>
                    Kategorija:

                    @foreach($newsItem->categories as $category)
                        {{ $category->category->name }}
                    @endforeach

                </div>

                <h1>{{$newsItem->title}}</h1>

                <div class="photo">
                    <img src="{{ asset($newsItem->main_image) }}" style="width: 300px">
                </div>

                <div>
                    Autorius:
                    <a href="{{route('news.author', $newsItem->user_id )}}">
                        {{ $newsItem->user->name }}
                    </a>
                </div>


                <div class="col-sm-12 mt-2">
                    <p>
                        {!! $newsItem->content !!}
                    </p>
                </div>

                <hr>

                <div class="row">
                    <h5 class="col-sm-3" id="comments">
                        Komentarai
                    </h5>
                </div>

                @foreach($newsItem->comment as $comment)
                    <div class="col-sm-12 mt-2">
                        <div class="card mt-3">
                            <div class="card-header">

                                <div class="row">

                                    <div class="col-3 mt-2">
                                        Autorius:
                                        <a href="{{ route('news.author', $comment->user->id) }}">
                                            {{ $comment->user->name }}
                                        </a>
                                    </div>

                                    <div class="col-6">
                                        Komentaras parasytas: {{ $comment->created_at }}
                                    </div>
                                </div>

                                <div class="card-body">
                                    {{ $comment->comment_text }}
                                </div>

                                <div class="row">
                                    <div class="col-sm-1">
                                        <td>
                                            <form method="post" action="{{ route('comments.destroy', $comment->id) }}">
                                                @csrf
                                                @method ('delete')
                                                <input type="submit" value="Trinti" class="btn btn-danger"/>
                                            </form>
                                        </td>
                                    </div>

                                    <div class="col-sm-2">
                                        <td>
                                            <a href="{{ route('comments.edit', $comment->id) }}"
                                               class="btn btn-primary">
                                                Redaguoti
                                            </a>
                                        </td>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-8">
                Rasyti komentara

                <form method="post" action="{{ route('comments.store') }}">
                    @csrf

                    <input type="hidden" value="{{ $newsItem->id }}" name="news_id"/>

                    <textarea name="content" class="form-control mt-3"></textarea>

                    <input type="submit" class="btn btn-success mt-3"/>

                </form>
            </div>
        </div>
    </div>
@endsection

