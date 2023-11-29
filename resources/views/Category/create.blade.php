@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card   bg-warning bg-gradient">
                    <div class="card-header">Typy sprzętu</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('category.store') }}">




                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Utwórz nowy typ</label>

                                <div class="col-4 md-6">
                                    <input id="type" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" >
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary bg-dark" style="margin-top: 10px">
                                        Dodaj
                                    </button>
                                </div>

                            <div class="row">
                                <table class="table table-striped table-warning " id="equipment_table" style="margin-top: 20px" >
                                    <thead>
                                    <tr>
                                        <th scope="col">Typ</th>


                                    </tr>
                                    </thead>
                                    <tbody >

                                    @foreach(\App\Models\Category::all() as $category)
                                        <tr id="tr_data" data-id={{$category->id}}  >
                                            <td >{{$category->type}}
                                                <button type="button" class="btn btn-danger float-end"data-id="{{$category->id}}" id="type_delete"  >
                                                X
                                            </button></td>

                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </form>
                        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#type_delete').click(function() {
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
                                                url: "http://127.0.0.1:8000/category/"+ $(this).data("id"),
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection