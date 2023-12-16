@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6" style="font-size: 25px">
                Lista użytkowników
            </div>
            <div class="col-6" style="margin-bottom: 20px">

                <a class="float-end" href="{{route('phonebook')}}">
                    <button type="button" class="btn btn-warning"  id="btn_phone"  name="btn_phone" style="margin-right: 20px">Książka telefoniczna</button>
                </a>

            </div>
            <div class="row">
                <table class="table table-striped table-dark dataTable" id="user_table">
                    <thead>
                    <tr>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Stanowisko</th>
                        <th scope="col">Zakład</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefon</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastname}}</td>
                            <td >@if(!is_null( $user->positions)){{$user->positions->name}}@endif</td>
                            <td >@if(!is_null( $user->departments)){{$user->departments->name}} {{$user->departments->city}}@endif</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>

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

                    });
                </script>

            </div>
        </div>



@endsection


