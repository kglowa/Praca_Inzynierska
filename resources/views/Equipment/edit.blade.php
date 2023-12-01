@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card   bg-warning bg-gradient">
                    <div class="card-header">Sprzęt</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('equipment.update', $equipment->id) }}">

                            @csrf
                            <div class="row mb-3">
                                <label for="mark" class="col-md-4 col-form-label text-md-end">Marka</label>

                                <div class="col-md-6">
                                    <input id="mark" class="form-control @error('mark') is-invalid @enderror" name="mark" value="{{ $equipment->mark }}" >
                                    @error('mark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="model" class="col-md-4 col-form-label text-md-end">Model</label>

                                <div class="col-md-6">
                                    <input id="model" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ $equipment->model }}" >
                                    @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="SerialNumber" class="col-md-4 col-form-label text-md-end">S/N</label>

                                <div class="col-md-6 ">
                                    <input id="SerialNumber" class="form-control @error('SerialNumber') is-invalid @enderror" name="SerialNumber" value="{{ $equipment->SerialNumber }}" >
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
                                    <button type="submit" class="btn btn-primary bg-dark" id="btn_edit">
                                        Zmień
                                    </button>

                                        <button type="button" class="btn btn-primary bg-dark" id="btn_pdf" data-id="{{$equipment->user_id}}" form="" >
                                        PDF
                                        </button>

                                    <button  type="button"  class="btn btn-danger btn-danger " id="btn_delete" data-id="{{$equipment->id}}" style="width: 65px; margin-left: 10px">
                                        X
                                    </button>
                                </div>
                            </div>
                        </form>
                        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#btn_delete').on('click',function() {
                                    Swal.fire({
                                        title: "Czy jesteś pewny?",
                                        text: "Zmian nie da się przywrócić",
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
                                                url: "http://127.0.0.1:8000/equipment/"+ $(this).data("id"),
                                                data:{_method: 'delete', _token: '{{ csrf_token() }}'}

                                            })

                                                .done(function (response){
                                                    window.location.replace("http://127.0.0.1:8000/equipment/");
                                                })
                                        }
                                    });


                                    })
                            });
                        </script>

                        <script>
                            $(document).ready(function() {
                                $('.js-example-basic-multiple').select2({
                                    dropdownParent:'#select_div'
                                });
                            });
                        </script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#btn_pdf').on('click',function() {
                                    Swal.fire({
                                        title: "Protokół został wysłany!",
                                        icon: "info"
                                    }).then((result)=>{
                                        $.ajax({
                                            method: "GET",
                                            url: @js(route('order.store')),
                                            data: {_method: 'get', _token: '{{ csrf_token() }}', user_id: $('#btn_pdf').data("id") },
                                            success: function(data) {
                                                console.log($('#btn_pdf').data("id"));

                                            },
                                        })


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
