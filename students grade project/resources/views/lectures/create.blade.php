@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('lectures.store') }}">
        @csrf
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
                    <h4>Prideti nauja paskaita</h4>

                    <input class="form-control mt-3" name="name" value="{{ old('name') }}"
                           placeholder="Pavadinimas"/>

                    <textarea id="lecture" name="description"  class="form-control mt-3"
                              placeholder="Paskaitos aprasymas">{{ old('description') }}</textarea>

                    <input type="submit" class="btn btn-success mt-3"/>

                </div>

            </div>
        </div>
    </form>

    <script>

        // noredami pasinaudoti ckeditor, naudojame CKEDITOR.replace funkcija
        // kaip parametra perduodame textarea elemento ID

        // PAPILDOMAI: layouts/app.blade.php faile nuimti defer attributa nuo app.js failo include'o
        CKEDITOR.replace('lecture');
    </script>

@endsection

