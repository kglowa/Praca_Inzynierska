@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6" style="font-size: 25px">
                Lista Sprzętu
            </div>
            <div class="col-6" style="margin-bottom: 20px">
                <a class="float-end" href="{{route('equipment.create')}}">
                    <button type="button" class="btn btn-warning">Dodaj</button>
                </a>
                <a class="float-end" href="{{route('category.create')}}">
                    <button type="button" class="btn btn-warning" style="margin-right: 20px">Typy</button>
                </a>

            </div>
            <div class="row">
                <table class="table table-striped table-dark dataTable" id="equipment_table" >
                    <thead>
                    <tr>
                        <th scope="col">Marka</th>
                        <th scope="col">Model</th>
                        <th scope="col">S/N</th>
                        <th scope="col">Typ</th>
                        <th scope="col">Użytkownik</th>

                    </tr>
                    </thead>
                    <tbody >
                    @foreach($equipments as $equipment)
                        <tr id="tr_data" data-id={{$equipment->id}}  >
                            <td >{{$equipment->mark}}</td>
                            <td>{{$equipment->model}}</td>
                            <td>{{$equipment->SerialNumber}}</td>
                            <td >@if(!is_null( $equipment->categories)){{$equipment->categories->type}}@endif</td>
                            <td id="id_user_ref">@if(!is_null( $equipment->users)){{$equipment->users->name}} {{$equipment->users->lastname}}@endif</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
                <script>
                    $(document).ready(function() {
                        let table = new DataTable('#equipment_table',{

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
                            window.location.replace("http://127.0.0.1:8000/equipment/edit/"+ $(this).data("id"));
                        });

                    });
                </script>


            </div>
        </div>
@endsection


