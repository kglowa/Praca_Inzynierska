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
<h2>Witaj {{$user->name}}!</h2>
<a>Utworzyliśmy dla Ciebie konto w aplikacji PTMS.
    <br>Poniżej znajduję się link do strony w której nadasz hasło do Twojego konta,
    <br><br><a href="http://127.0.0.1:8000/users/reset/{{$user->id}}">Nadanie hasła</a><br><br>
Pozdrawiamy,<br>
Zespół PTMS</a>


</body>
</html>
