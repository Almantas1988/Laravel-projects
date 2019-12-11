@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container">

            <div class="row">
                <div class="col-8">
                    <h4>Sukurti naujiena</h4>

                    <input class="form-control mt-3" name="title"/>

                    <textarea id="content" name="content" class="form-control mt-3"></textarea>

                    <input type="file" name="photo" class="form-control" accept="image/*"/>

                    <input type="submit" class="btn btn-success mt-3"/>

                </div>

                <div class="col-4">
                    <h4>Naujienos kategorijos</h4>

                    <select name="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>
        </div>
    </form>

    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
