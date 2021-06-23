@extends("layout")

@section("title", "Edit - mylnks")

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

    <form method="POST" action=""> <!-- NO TÉ ACTION! Hauria de ser route("link.update") -->
        @csrf
        @method("PUT")
        <div class="card mt-5 bg-sublime border-sublime nl-add-new-link">
            <div class="card-body">
                <input class="form-control border-0 bg-sublime pl-0 no-outline text-black ts-bigger"
                       type="text" name="title" value="{{ old("title", $link->title) }}" placeholder="Títol d'exemple">
                <br>
                <input class="form-control border-0 bg-sublime pl-0 no-outline text-black ts-bigger"
                       type="url" name="url" value="{{ old("url", $link->url) }}" placeholder="https://www.exemple.cat/">
                <br>
                <input class="btn btn-primary"
                       type="submit" value="Actualitza">
            </div>
        </div>
    </form>

    <a href="{{ route("links.index") }}">Tornar al llistat</a>

@endsection
