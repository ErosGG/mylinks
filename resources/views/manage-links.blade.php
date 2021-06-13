@extends("layout")

@section("title", "Manage - mylnks")

@section("content")
    <h1>Manage Links</h1>
    <p>Aquesta és la pàgina per a gestionar els links</p>
    <p>S'haurà de poder crear links així com generar una taula amb tots ells per poder-los editar i eliminar</p>
    <div>
        <form method="POST" action="{{ route("manage.create") }}">
            @csrf
            <input type="text" name="title" placeholder="Títol d'exemple"><br>
            <input type="text" name="link" placeholder="https://www.exemple.cat/"><br>
            <input type="submit" value="Afegeix">
        </form>
    </div>
    <table>
        @foreach($links as $link)
            <tr>
                <td>
                    <a href="{{$link->link}}">{{$link->title}}</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
