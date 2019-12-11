@extends('layouts.app')

@section('content')
    <div class="container">
        <div  class="row">
            <div class="col-6">
                Kategorija: {{ $category->name }}
            </div>


            <div class="col-6">
                @foreach($category->news as $newItem)
                    <div class="col-6 mt-3">
                        <h4>
                            {{ $newItem->newsItem->title }}
                        </h4>

                        <div>
                            Autorius: {{ $newItem->newsItem->user->name}}
                        </div>

                        <div>
                            <a href="{{ route('news.show', $newItem->newsItem->id) }}">
                                Skaityti daugiau
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
