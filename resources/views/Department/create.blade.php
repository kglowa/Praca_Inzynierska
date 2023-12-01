@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card   bg-warning bg-gradient">
                    <div class="card-header">Zakłady</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('department.store') }}">




                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nazwa</label>

                                <div class="col-4 md-6">
                                    <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" >
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div></div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Miasto</label>

                                <div class="col-4 md-6">
                                    <input id="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" >
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div></div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Lokalizacja</label>

                                <div class="col-4 md-6">
                                    <input id="location" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" >
                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div></div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Numer</label>

                                <div class="col-4 md-6">
                                    <input id="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" >
                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div></div>
                            <div class="row mb-3">
                                <div class="col-4 md-6">

                            <button type="submit" class="btn btn-primary bg-dark" style="margin-top: 10px">
                                    Dodaj
                            </button></div></div>
                                <div class="row">
                                    <table class="table table-striped table-warning " id="equipment_table" style="margin-top: 20px" >
                                        <thead>
                                        <tr>
                                            <th scope="col">Nazwa</th>

                                            <th scope="col">Miasto</th>

                                            <th scope="col">Lokalizacja</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody >

                                        @foreach(\App\Models\Department::all() as $department)
                                            <tr id="tr_data" data-id={{$department->id}}  >
                                                <td >{{$department->name}}</td>
                                                <td >{{$department->city}}</td>
                                                <td >{{$department->location}} {{$department->number}}</td>
                                               <td> <button type="button" class="btn btn-danger float-end"data-id="{{$department->id}}" id="department_delete"  >
                                                    X
                                                </button></td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                        </form>
                    </div>
                        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#department_delete').click(function() {
                                    Swal.fire({
                                        title: "Czy jesteś pewny?",
                                        text: "Pamiętaj żeby usunąć wcześniej użytkowników przypisanych do tego zakładu",
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
                                                url: "http://127.0.0.1:8000/department/"+ $(this).data("id"),
                                                data:{_method: 'delete', _token: '{{ csrf_token() }}'}

                                            }).fail(function (){
                                                Swal.fire({
                                                    title: "Błąd!",
                                                    text: "Zakład który chciałeś usunąć posiada przypisanych do niego użytkowników",
                                                    icon: "error"
                                                });
                                            }).done(function (response){
                                                Swal.fire({
                                                    title: "Zakład został usunięty!",
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
