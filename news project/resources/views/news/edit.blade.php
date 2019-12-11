@extends('layouts.app')

@section('content')
    <div class="container">
        <div  class="row">
            <div class="col-12">
                Redaguoti naujiena {{ $newsItem->title }}

                <form method="post" action="{{ route('news.update', $newsItem->id) }}">
                    @csrf
                    @method ('put')
                    <input class="form-control mt-3" name="title" />

                    <textarea name="content" class="form-control mt-3"></textarea>

                    <input type="submit" class="btn btn-success mt-3" />
                </form>
            </div>

        </div>
    </div>
@endsection

