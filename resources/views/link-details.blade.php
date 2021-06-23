@extends("layout")

@section("title", "Link Details - mylnks")

@section("content")
    <div class="card mt-5 bg-sublime border-sublime">
        <div class="card-body">
            <h5 class="card-title fw-bold">{{ $link->title }}</h5>
            <p class="card-text text-black-50">{{ $link->url }}</p>
            <p class="card-text text-black-50"><i class="bi bi-binoculars-fill"></i> {{ $link->views }} {{ $link->views === 1 ? "visita" : "visites" }}</p>
            <form action="{{ route("link.delete", $link) }}" method="POST">
                @csrf
                @method("DELETE")
                <a href="{{ route("link.edit", $link) }}" class="btn btn-link"><i class="bi bi-pencil-square"></i></a>
                <button type="submit" class="btn btn-link"><i class="bi bi-trash"></i></button>
            </form>
        </div>
    </div>

    <a href="{{ route("links.index") }}">Tornar al llistat</a>

@endsection
