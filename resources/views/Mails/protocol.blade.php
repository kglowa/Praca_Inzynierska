<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style>
     th, td {
    border:4px solid black;}
    td,th{
        height: 20px;
    }
     body {
         font-family: DejaVu Sans;
     }
</style>
<body>
<h1 style=" margin-left: 100px;text-align: left; font-size: 30px"></h1>
<table style="width:20%; text-align: center; margin-left: 60px;margin-top: 20px; font-size: 30px;width: 600px; height: 300px;border:4px solid black">
    <tr><td colspan="2" style="text-align: center">Protokół zdawczo/odbiorczy</td></tr>
    <tr><th class="col">Imię</th><td>{{$user->name}}</td> </tr>
    <tr><th class="col">Nazwisko</th><td>{{$user->lastname}}</td></tr>
    <tr><th class="col">Zakład</th><td>{{$user->departments->name}} {{$user->departments->city}}</td></tr>
    <tr><th class="col">Stanowisko</th><td>{{$user->positions->name}}</td></tr>
    @foreach ($user->equipments as $equipment)
        <tr><th class="col">Typ</th><td>{{$equipment->categories->type}}</td></tr>
        <tr><th class="col">Marka</th><td>{{$equipment->mark}}</td></tr>
    <tr><th class="col">Model</th><td>{{$equipment->model}}</td></tr>
    <tr><th class="col">S/N</th><td>{{$equipment->SerialNumber}}</td></tr>
    @endforeach
    <tr><th class="col">Data</th><td>{{date("d-m-Y")}}</td></tr>
</table>

    <div >
        <div style="float: left; margin-left: 80px;margin-top: 100px">
            <h1 style="font-size: 20px">Przekazujacy:</h1>
            <h1 style="font-size: 20px; margin-top: 150px">Odbierajacy:</h1>
        </div>

    </div>
</body>
</html>
