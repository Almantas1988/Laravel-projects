@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-12">

                <h1>
                    {{ $lectures->name }}
                </h1>

                <div >
                    <strong>Paskaitos aprasymas:</strong>
                </div>
                <p>
                    {{ $lectures->description }}
                </p>

            </div>

        </div>

        <hr>

        <div class="row">
            <div class="col-sm-1">
                <td>
                    <form method="post" action="{{ route('lectures.destroy', $lectures->id) }}">
                        @csrf
                        @method ('delete')
                        <input type="submit" value="Trinti" class="btn btn-danger"/>
                    </form>
                </td>
            </div>

            <div class="col-sm-3">
                <td>
                    <a href="{{ route('lectures.edit', $lectures->id) }}" class="btn btn-primary">
                        Redaguoti
                    </a>
                </td>
            </div>
        </div>

    </div>
@endsection



