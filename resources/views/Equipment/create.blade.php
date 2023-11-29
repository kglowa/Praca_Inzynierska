@extends('layouts.app')

@section('content')

    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card   bg-warning bg-gradient">
                    <div class="card-header">Dodawanie Sprzętu</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('equipment.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="mark" class="col-md-4 col-form-label text-md-end">Marka</label>

                                <div class="col-md-6">
                                    <input id="mark" class="form-control @error('mark') is-invalid @enderror" name="mark" value="{{ old('mark') }}" >
                                    @error('mark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lastname" class="col-md-4 col-form-label text-md-end">Model</label>

                                <div class="col-md-6">
                                    <input id="model" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" >
                                    @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="SerialNumber" class="col-md-4 col-form-label text-md-end">S/N</label>

                                <div class="col-md-6">
                                    <input id="SerialNumber" class="form-control @error('SerialNumber') is-invalid @enderror" name="SerialNumber" value="{{ old('SerialNumber') }}" >
                                    @error('SerialNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="type" class="col-md-4 col-form-label text-md-end">Typ</label>
                                <div class="col-md-6" id="select_div">
                                        <select class="js-example-basic-multiple form-control @error('category_id') is-invalid @enderror"  multiple="multiple" name="category_id" value="{{ old('category_id') }}" >
                                            @foreach(\App\Models\Category::all() as $category)

                                                <option value="{{$category->id}}">{{$category->type}}</option>
                                            @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="type" class="col-md-4 col-form-label text-md-end">Użytkownik</label>

                                <div class="col-md-6">
                                    <select class="js-example-basic-multiple form-control"  multiple="multiple" id="user_id" name="user_id"  value="{{old('user_id')}}" >


                                    @foreach(\App\Models\User::all() as $user)

                                            <option value="{{$user->id}}">{{$user->name}} {{$user->lastname}}</option>
                                @endforeach

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
