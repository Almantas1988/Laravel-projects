@extends('layouts.app')

@section('content')
    <div class="container">
        <div  class="row">
            <div class="col-12">
                Autorius: {{ $user->name }}
            </div>

            <div class="col-6">
                <h2>Autoriaus naujienos</h2>
                @foreach($user->news as $newsItem)
                    <div class="col-6 mt-3">
                        <h4>
                            {{ $newsItem->title }}
                        </h4>

                        <div class="photo">
                            <img src="{{ asset($newsItem->main_image) }}" style="width: 300px" >
                        </div>

                        <div>
                            Autorius:
                            <a href="{{ route('news.author', $newsItem->user_id) }}">
                                {{ $newsItem->user->name }}
                            </a>

                        </div>

                        <div>
                            <a href="{{ route('news.show', $newsItem->id) }}">
                                Skaityti daugiau
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="col-6">
                <h5>Vartotojo komentarai</h5>

                @foreach($user->comments as $comment)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('news.show', $comment->newsItem->id) }}">
                                {{ $comment->newsItem->title }}
                            </a>
                        </div>
                        <div class="card-body">
                            {{ $comment->comment_text }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

