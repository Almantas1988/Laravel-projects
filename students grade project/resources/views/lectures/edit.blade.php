@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h4>Redaguoti paskaita {{ $lectures->name }}</h4>

                <form method="post" action="{{ route('lectures.update', $lectures->id) }}">
                    @csrf
                    @method ('put')

                    <input class="form-control mt-3" name="name" value="{{ old('name') }}"
                           placeholder="Pavadinimas"/>

                    <textarea id="lecture2" name="description" class="form-control mt-3"
                              placeholder="Paskaitos aprasymas">{{ old('description') }}</textarea>

                    <input type="submit" class="btn btn-success mt-3"/>
                </form>
            </div>
        </div>
    </div>

    <script>

        // noredami pasinaudoti ckeditor, naudojame CKEDITOR.replace funkcija
        // kaip parametra perduodame textarea elemento ID

        // PAPILDOMAI: layouts/app.blade.php faile nuimti defer attributa nuo app.js failo include'o
        CKEDITOR.replace('lecture2');
    </script>

@endsection


