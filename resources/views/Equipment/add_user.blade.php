@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card   bg-warning bg-gradient">
                    <div class="card-header"> {{$equipment->mark}} {{$equipment->model}}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('equipment.update', $equipment->id) }}">
                            @csrf
                            <div class="row mb-3">
                                <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" required autocomplete="user_id" autofocus   value="{{old('user_id')}}" >

                                @foreach(\App\Models\User::all() as $user)


                                        <option value="{{$user->id}}">{{$user->name}} {{$user->lastname}}</option>


                                                @endforeach
                                                </select>

                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary bg-dark">
                                        Dodaj
                                    </button>
                                </div>

                                </div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
