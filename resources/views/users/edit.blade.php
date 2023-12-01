@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card   bg-warning bg-gradient">
                <div class="card-header">Modyfikacja użytkownika</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Imię</label>

                            <div class="col-md-6">
                                <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" >
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
                                <input id="lastname" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $user->lastname }}" >
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
                                <input id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" >
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ $user->password }}" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">Stanowisko</label>

                            <div class="col-md-6" id="select_div">
                                <select class="js-example-basic-multiple form-control @error('positions_id') is-invalid @enderror"  multiple="multiple" name="positions_id" value="{{ $user->positions_id }}" >
                                    @foreach(\App\Models\Position::all() as $position)

                                        <option value="{{$position->id}}">{{$position->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">Zakład</label>

                            <div class="col-md-6" id="select_div">
                                <select class="js-example-basic-multiple form-control @error('departments_id') is-invalid @enderror"  multiple="multiple" name="departments_id" value="{{ $user->departments_id }}" >
                                    @foreach(\App\Models\Department::all() as $department)

                                        <option value="{{$department->id}}">{{$department->name}} {{$department->city}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary bg-dark" id="btn_edit">
                                    Zmień
                                </button>
                                <button  type="button"  class="btn btn-danger btn-danger " id="user_delete" data-id="{{$user->id}}" style="width: 65px; margin-left: 10px">
                                    X
                                </button>
                            </div>
                        </div>
                    </form>
                    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#user_delete').click(function() {
                                Swal.fire({
                                    title: "Czy jesteś pewny?",
                                    text: "Upewnij się, że ten użytkownik nie posiada żadnego urządzenia na stanie",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Tak, usuń!",
                                    cancelButtonText: "Anuluj"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            method:"DELETE",
                                            url: "http://127.0.0.1:8000/users/"+ $(this).data("id"),
                                            data:{_method: 'delete', _token: '{{ csrf_token() }}'}

                                        }).fail(function (){
                                            Swal.fire({
                                                title: "Błąd!",
                                                text: "",
                                                icon: "error"
                                            });
                                        }).done(function (response){
                                            Swal.fire({
                                                title: "Użytkownik został usunięty!",
                                                text: "",
                                                icon: "info"
                                            }).then((result)=>{
                                                window.location.replace("http://127.0.0.1:8000/users/list/");

                                            });
                                        })
                                    }
                                });


                            })
                        });
                    </script>
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
