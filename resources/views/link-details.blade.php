@extends("layout")

@section("title", "Link Details - mylnks")

@section("content")
    @if ($link)
        <h1>Detalls del link {{ $link->id }}</h1>
        <div class="link-container">
            <p>Títol: {{ $link->title }}</p>
            <p>URL: {{ $link->url }}</p>
            <p>Clics: {{ $link->views }}</p>
        </div>
    @else
        <h1>No existeix el link {{ $link_id }}</h1>
    @endif
    <a href="{{ route("links.index") }}">Tornar al llistat</a>

@endsection
