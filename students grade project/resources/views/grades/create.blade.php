@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <form method="POST" action="{{ route('grades.store') }}">
                    @csrf

                    <div class="form-group">
                        <div>Pasirinkite studenta: </div>

                        <select class="form-control" name="student_id">
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">
                                    {{ $student->name }} {{ $student->surname}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div>Pasirinkite paskaita: </div>

                        <select class="form-control" name="lecture_id">
                            @foreach($lectures as $lecture)
                                <option value="{{ $lecture->id }}">
                                    {{ $lecture->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label>Ivertinimas</label>
                            <input type="number" name="grade" class="form-control" />
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success" />

                </form>
            </div>
        </div>
    </div>

@endsection
