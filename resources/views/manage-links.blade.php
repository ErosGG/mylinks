@extends("layout")

@section("title", "Manage - mylnks")

@section("content")
    <h1>Manage Links</h1>
    <p>Aquesta és la pàgina per a gestionar els links</p>
    <p>S'haurà de poder crear links així com generar una taula amb tots ells per poder-los editar i eliminar</p>
    <form method="POST" action="{{ route("links.create") }}">
        @csrf
        <div class="card mt-5 bg-sublime border-sublime nl-add-new-link">
            <div class="card-body">
                <input class="form-control border-0 bg-sublime pl-0 no-outline text-black ts-bigger" type="text" name="title" placeholder="Títol d'exemple"><br>
                <input class="form-control border-0 bg-sublime pl-0 no-outline text-black ts-bigger" type="text" name="url" placeholder="https://www.exemple.cat/"><br>
                <input class="btn btn-primary" type="submit" value="Afegeix">
            </div>
        </div>
    </form>
    <div>
        @forelse ($links as $link)
            <div class="link-container">
                <p>{{ $link->title }}</p>
                <p>{{ $link->url }}</p>
                <a href="{{ route("link.details", ["link_id" => $link->id]) }}">Detalls</a>
                <a href="">Editar</a>
                <a href="">Eliminar</a>
            </div>
        @empty
            <p>No hi ha links</p>
        @endforelse
    </div>
@endsection
