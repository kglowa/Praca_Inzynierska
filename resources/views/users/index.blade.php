@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6" style="font-size: 25px">
              Lista użytkowników
            </div>
            <div class="col-6" style="margin-bottom: 20px">
                <a class="float-end" href="{{route('users.create')}}">
                    <button type="button" class="btn btn-warning">Dodaj</button>
                </a>
                <a class="float-end" href="{{route('department.create')}}">
                    <button type="button" class="btn btn-warning" style="margin-right: 20px">Zakłady</button>
                </a>
                <a class="float-end" href="{{route('position.create')}}">
                    <button type="button" class="btn btn-warning" style="margin-right: 20px">Stanowiska</button>
                </a>
                <a class="float-end" href="{{route('phonebook')}}">
                    <button type="button" class="btn btn-warning"  id="btn_phone"  name="btn_phone" style="margin-right: 20px">Książka telefoniczna</button>
                </a>

            </div>
        <div class="row">
<table class="table table-striped table-dark dataTable" id="user_table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Imię</th>
        <th scope="col">Nazwisko</th>
        <th scope="col">Stanowisko</th>
        <th scope="col">Zakład</th>
        <th scope="col">Email</th>

    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr id="tr_data" data-id={{$user->id}} >
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->lastname}}</td>
        <td >@if(!is_null( $user->positions)){{$user->positions->name}}@endif</td>
        <td >@if(!is_null( $user->departments)){{$user->departments->name}} {{$user->departments->city}}@endif</td>
        <td>{{$user->email}}</td>

{{--        <td>--}}
{{--            <a href="{{route('users.edit',$user->id)}}">--}}
{{--                <button class="btn btn-warning btn-sm">Zmień</button>--}}
{{--            </a>--}}
{{--        </td>--}}
{{--            <td>--}}
{{--                <button    class="btn btn-danger btn-sm " id="delete" data-id="{{$user->id}}">--}}
{{--                    X--}}
{{--                </button>--}}
{{--                <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>--}}
{{--                <script type="text/javascript">--}}
{{--                    $(document).ready(function() {--}}
{{--                        $('#delete').click(function() {--}}
{{--                            Swal.fire({--}}
{{--                                title: 'Czy napewno chcesz usunąć tego użytkownika?',--}}
{{--                                showDenyButton: true,--}}
{{--                                confirmButtonText: 'Tak',--}}
{{--                                denyButtonText: `Nie`,--}}
{{--                            }).then((result) => {--}}
{{--                                $.ajax({--}}
{{--                                    method:"DELETE",--}}
{{--                                    url: "http://127.0.0.1:8000/users/"+ $(this).data("id"),--}}
{{--                                    data:{_method: 'delete', _token: '{{ csrf_token() }}'}--}}

{{--                                })--}}
{{--                                    .done(function (response){--}}
{{--                                        window.location.reload();--}}
{{--                                    })--}}

{{--                            })                        });--}}
{{--                    });</script>--}}
{{--        </td>--}}
    </tr>
    @endforeach

    </tbody>
</table>
            <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
            <script>
                $(document).ready(function() {
                    let table = new DataTable('#user_table',{

                        language: {
                            search: 'Wyszukaj',
                            info: 'Strona _PAGE_ z _PAGES_',
                            infoEmpty: 'Brak wyników',
                            infoFiltered: ' (Znaleziono _END_ z _MAX_ elementów)',
                            lengthMenu: 'Wyświetlanie _MENU_ elementów na stronę',
                            zeroRecords: 'Brak elementów do wyświetlenia!',
                            paginate: {

                                "previous": "Poprzednia",
                                "next": "Następna"
                            }
                        }

                    });
                    table.on('click', 'tbody tr', function () {
                        window.location.replace("http://127.0.0.1:8000/users/edit/"+ $(this).data("id"));
                    });
                });
            </script>

        </div>
        </div>



@endsection


