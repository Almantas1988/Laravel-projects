@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-12">

                <h1>
                    {{ $students->name }}
                    {{ $students->surname }}
                </h1>

                <div>
                    El. pastas: {{ $students->email }}
                    Telefono nr.: {{ $students->phone }}
                </div>

            </div>

        </div>

        <hr>

        <div class="row">
            <div class="col-sm-1">
                <td>
                    <form method="post" action="{{ route('students.destroy', $students->id) }}">
                        @csrf
                        @method ('delete')
                        <input type="submit" value="Trinti" class="btn btn-danger"/>
                    </form>
                </td>
            </div>

            <div class="col-sm-3 mb-3">
                <td>
                    <a href="{{ route('students.edit', $students->id) }}" class="btn btn-primary">
                        Redaguoti
                    </a>
                </td>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <table class="table table-bordered">
                    <tr>
                        <th><strong>Paskaitos pavadinimas</strong></th>
                        <th><strong>Ivertinimas</strong></th>
                    </tr>
                    @foreach($students->grade as $grade)
                        <tr>
                            <td> {{ $grade->lecture->name }} </td>
                            <td>{{ $grade->grade }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
@endsection


