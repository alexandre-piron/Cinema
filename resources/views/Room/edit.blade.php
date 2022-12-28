<table class='table'>

    <form action="{{route('room.update', $room->id) }}" method="POST">
        @csrf
        @method("PATCH")
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif <!--checke les erreurs en fonction des paramètres dans UpdatecategorieRequest.php -->
        
        <input type="hidden" id="id" name="id" value="{{ $room->id }}"><br>
        <input type="hidden" id="id_cinema" name="id_cinema" value="{{ $room->id_cinema }}"><br>
        <label for="nom">Nom de la salle</label>
        <input type="text" id="name" name="name" value="{{ $room->name }}"><br>
        <label for="rangee">Nombre de rangées de sièges</label>
        <input type="integer" id="rangee" name="nb_rangees" value="{{ $room->nb_rangees }}"><br>
        <label for="siege">Nombre de sièges par rangée</label>
        <input type="integer" id="siege" name="nb_sieges" value="{{ $room->nb_sieges }}"><br>

        <input id="sub" type="submit">
    </form>
</table>