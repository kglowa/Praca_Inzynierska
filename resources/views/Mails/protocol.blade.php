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
<table style="width:20%; text-align: center; margin-left: 60px;margin-top: 10px; font-size: 30px;width: 600px; height: 300px;border:4px solid black">
    <tr><td colspan="2" style="text-align: center">PROTOKÓŁ {{date("Y")}}</td></tr>
    <tr><td colspan="2" style="text-align: center"></td></tr>
    <tr><td colspan="2" style="text-align: center">Dane użytkownika</td></tr>

    <tr><th class="col">IMIĘ</th><td>{{$user->name}}</td> </tr>
    <tr><th class="col">NAZWISKO</th><td>{{$user->lastname}}</td></tr>
    <tr><th class="col">ZAKŁAD</th><td>{{$user->departments->name}} {{$user->departments->city}}</td></tr>
    <tr><th class="col">STANOWISKO</th><td>{{$user->positions->name}}</td></tr>
    <tr><td colspan="2" style="text-align: center">Dane urządzenia</td></tr>

        <tr><th class="col">TYP</th><td>{{$equipment->categories->type}}</td></tr>
        <tr><th class="col">MARKA</th><td>{{$equipment->mark}}</td></tr>
    <tr><th class="col">MODEL</th><td>{{$equipment->model}}</td></tr>
    <tr><th class="col">S/N</th><td>{{$equipment->SerialNumber}}</td></tr>
    <tr><th class="col">DATA</th><td>{{date("d-m-Y")}}</td></tr>
</table>

    <div >
        <div style="float: left; margin-left: 80px;margin-top: 50px">

            <h1 style="font-size: 20px">Przekazujacy:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Odbierajacy:</h1>
            <h1 style="font-size: 20px; margin-top: 80px">...................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...................</h1>
        </div>

    </div>
</body>
</html>
