@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(isset($search))
                    <h4>
                        Naujienos pagal uzklausa: {{ $search }}
                    </h4>
                @else
                    <h4>
                        Naujienos
                    </h4>
                @endif
            </div>

            @foreach($news as $newsItem)
                <div class="col-6 mt-3">
                    <h4>
                        {{ $newsItem->title }}
                    </h4>

                    <div>
                        @if($newsItem->main_image != 'none')
                            <img src="{{ $newsItem->main_image }}" style="width: 300px"/>
                        @endif
                    </div>

                    <div>
                        Autorius:
                        <a href="{{route('news.author', $newsItem->user_id )}}">
                            {{ $newsItem->user->name }}
                        </a>
                    </div>

                    <p>
                        {!! $newsItem->execerpt() !!}
                    </p>

                    <div>
                        Komentarai
                        @if($newsItem->comment->count() != 0)
                            <a href="{{ route('news.show', $newsItem->id) }}#comments">
                                ({{ $newsItem->comment->count() }})
                            </a>
                        @endif

                    </div>

                    <div>
                        <a href="{{ route('news.show', $newsItem->id) }}">
                            Skaityti daugiau
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            @auth
                                <td>
                                    <form method="post" action="{{ route('news.destroy', $newsItem->id) }}">
                                        @csrf
                                        @method ('delete')
                                        <input type="submit" value="Trinti" class="btn btn-danger"/>
                                    </form>
                                </td>
                            @endauth
                        </div>

                        <div class="col-sm-6">
                            @auth
                                <td>
                                    <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-primary">
                                        Redaguoti
                                    </a>
                                </td>
                            @endauth
                        </div>

                    </div>
                </div>
            @endforeach

            @if(count($news) == 0 )
                <div class="col-sm-12">
                    <h1>
                        Nieko nerasta
                    </h1>
                </div>
            @endif


        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 mt-3">
                    {{ $news->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
