@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('students.store') }}">
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
                    <h4>Prideti nauja studenta</h4>

                    <input class="form-control mt-3" name="name"  value="{{ old('name') }}"
                           placeholder="Vardas"/>

                    <input class="form-control mt-3" name="surname" value="{{ old('surname') }}"
                           placeholder="Pavarde"/>

                    <input class="form-control mt-3" name="email" value="{{ old('email') }}"
                           placeholder="El. pastas"/>

                    <input class="form-control mt-3" name="phone" value="{{ old('phone') }}"
                           placeholder="Telefono nr."/>

                    <input type="submit" class="btn btn-success mt-3"/>

                </div>

            </div>
        </div>
    </form>

@endsection
