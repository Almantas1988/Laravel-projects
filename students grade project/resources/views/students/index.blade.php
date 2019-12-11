@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-8">
                Studentai:
            </div>

        </div>

        <div class="row">
            @foreach($students as $student)
                <div class="col-sm-8">
                    <ul class="list-group mt-2">
                        <li class="list-group-item">

                            {{ $student->name }}
                            {{ $student->surname }}

                            El. pastas: {{ $student->email }}
                            Telefono nr.: {{ $student->phone }}
                        </li>
                    </ul>
                </div>

                <div class="col-sm-4 mt-2">
                    <a class="btn btn-success" href="{{ route('students.show',$student->id) }}">
                        Perziureti ivertinimus
                    </a>
                </div>

            @endforeach

            @if(count($students) == 0 )
                <div class="col-sm-12">
                    <h1>
                        Nieko nerasta
                    </h1>
                </div>
            @endif
        </div>
    </div>
@endsection

