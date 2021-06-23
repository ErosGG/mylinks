@extends("layout")

@section("title", "Manage - mylnks")

@section("content")

    @if ($errors->any())
        <div class="alert alert-danger">
            <h5>Corregiu els errors següents:</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route("link.create") }}">
        @csrf
        <div class="card mt-5 bg-dark border-sublime nl-add-new-link">
            <div class="card-body">
                <input class="form-control border-0 bg-dark pl-0 no-outline text-white fs-5 ts-bigger"
                       type="text" name="title" value="{{ old("title") }}" placeholder="Títol d'exemple">
                <br>
                <input class="form-control border-0 bg-dark pl-0 no-outline text-white fs-5 ts-bigger"
                       type="url" name="url" value="{{ old("url") }}" placeholder="https://www.exemple.cat/">
                <br>
                <input class="btn btn-primary"
                       type="submit" value="Afegeix">
            </div>
        </div>
    </form>

    <div>
        @forelse ($links as $link)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $link->title }}</h5>
                    <p class="card-text text-black-50">{{ $link->url }}</p>
                    <form action="{{ route("link.delete", $link) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <a href="{{ route("link.details", $link) }}" class="btn btn-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="{{ route("link.edit", $link) }}" class="btn btn-link"><i class="bi bi-pencil-square"></i></a>
                        <button type="submit" class="btn btn-link"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
        @empty
            <p>No hi ha links</p>
        @endforelse
    </div>
@endsection
