@extends("layout")

@section("title", "$user - mylnks")

@section("content")
    <h1>Links - {{ $user }}</h1>
    <p>Links de l'usuari</p>
    @foreach($links as $link)
        <div>
            <a href="{{$link->link}}">{{$link->title}}</a>
        </div>
    @endforeach
@endsection
