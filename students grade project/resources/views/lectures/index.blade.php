@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-8">
                Paskaitos:
            </div>

        </div>

        <div class="row">
            @foreach($lectures as $lecture)
                <div class="col-sm-8">

                    <ul class="list-group mt-2">
                        <li class="list-group-item">
                            <a href="{{ route('lectures.show', $lecture->id) }}">
                                {{ $lecture->name }}
                            </a>
                        </li>
                    </ul>
                </div>

            @endforeach

            @if(count($lectures) == 0 )
                <div class="col-sm-12">
                    <h1>
                        Nieko nerasta
                    </h1>
                </div>
            @endif
        </div>
    </div>
@endsection


