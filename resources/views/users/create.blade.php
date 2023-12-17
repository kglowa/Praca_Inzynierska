@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card   bg-warning bg-gradient">
                <div class="card-header">Dodawanie użytkownika</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="row mb-3">

                            <label for="name" class="col-md-4 col-form-label text-md-end">Imię</label>

                            <div class="col-md-6">
                                <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">Nazwisko</label>

                            <div class="col-md-6">
                                <input id="lastname" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" >
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Numer telefonu</label>

                            <div class="col-md-6">
                                <input id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" >
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Hasło</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">Zakład</label>
                            <div class="col-md-6" id="select_div">
                                <select class="js-example-basic-multiple form-control @error('departments_id') is-invalid @enderror"  multiple="multiple" name="departments_id" value="{{ old('departments_id') }}" >
                                    @foreach(\App\Models\Department::all() as $department)

                                        <option value="{{$department->id}}">{{$department->name}} {{$department->city}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">Stanowisko</label>
                            <div class="col-md-6" id="select_div">
                                <select class="js-example-basic-multiple form-control @error('positions_id') is-invalid @enderror"  multiple="multiple" name="positions_id" value="{{ old('positions_id') }}" >
                                    @foreach(\App\Models\Position::all() as $position)

                                        <option value="{{$position->id}}">{{$position->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">Uprawnienia</label>
                            <div class="col-md-6" id="select_div">
                                <select class="js-example-basic-multiple form-control "  multiple="multiple" name="role_id"  >
                                        <option value="3">Użytkownik</option>
                                        <option value="2">Administrator</option>

                                </select>

                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary bg-dark">
                                  Dodaj
                                </button>
                            </div>
                        </div>
                    </form>
                    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
                    <script type="text/javascript"></script>
                    <script>
                        $(document).ready(function() {
                            $('.js-example-basic-multiple').select2({
                                dropdownParent:'#select_div'
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
