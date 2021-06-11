@extends("layout")

@section("title", "$user - mylnks")

@section("content")
    <h1>Links de l'usuari {{ $user }}</h1>
    <p>Aquesta és la pàgina per a mostrar els links</p>
@endsection
