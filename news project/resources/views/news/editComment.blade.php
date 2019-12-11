@extends('layouts.app')

@section('content')
    <div class="container">
        <div  class="row">
            <div class="col-12">
                Redaguoti komentara

                <form method="post" action="{{ route('comments.update', $comment->id) }}">
                    @csrf
                    @method ('put')

                    <textarea name="content" class="form-control mt-3">{{ $comment->comment_text }}</textarea>

                    <input type="submit" class="btn btn-success mt-3" />
                </form>
            </div>

        </div>
    </div>
@endsection

