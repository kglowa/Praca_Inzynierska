@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card   bg-warning bg-gradient">
                    <div class="card-header">Nowe hasło</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Nadaj hasło</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ $user->password }}" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4" style="margin-top: 20px; margin-left: 279px">

                                        <button type="submit" class="btn btn-primary bg-dark" >
                                            Zmień
                                        </button>

                                    </div>
                                </div>

                    </div>
                        </form>

                    </div>
            </div>
        </div>
    </div>
@endsection
