@extends("layout")

@section("title", "Manage - mylnks")

@section("content")
    <h1>Manage Links</h1>
    <p>Aquesta és la pàgina per a gestionar els links</p>
    <p>S'haurà de poder crear links així com generar una taula amb tots ells per poder-los editar i eliminar</p>

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
        <div class="card mt-5 bg-sublime border-sublime nl-add-new-link">
            <div class="card-body">
                <input class="form-control border-0 bg-sublime pl-0 no-outline text-black ts-bigger"
                       type="text" name="title" value="{{ old("title") }}" placeholder="Títol d'exemple">
                <br>
                <input class="form-control border-0 bg-sublime pl-0 no-outline text-black ts-bigger"
                       type="url" name="url" value="{{ old("url") }}" placeholder="https://www.exemple.cat/">
                <br>
                <input class="btn btn-primary"
                       type="submit" value="Afegeix">
            </div>
        </div>
    </form>

    <div>
        @forelse ($links as $link)
            <div class="link-container">
                <p>{{ $link->title }}</p>
                <p>{{ $link->url }}</p>
                <a href="{{ route("link.details", $link) }}">Detalls</a>
                <a href="{{ route("link.edit", $link) }}">Editar</a>
                <form action="{{ route("link.delete", $link) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Eliminar</button>
                </form>
            </div>
        @empty
            <p>No hi ha links</p>
        @endforelse
    </div>
@endsection
