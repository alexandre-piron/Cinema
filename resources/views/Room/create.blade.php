<form action="{{ route('room.store') }}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif <!--checke les erreurs en fonction des paramètres dans UpdatecategorieRequest.php -->
        <input type="hidden" name="id_cinema" value="{{ $cinema->id }}"><br>
        <label for="name">Nom de la salle</label>
        <input type="text" id="name" name="name"><br>
        <label for="rangee">Nombre de rangées de sièges</label>
        <input type="integer" id="rangee" name="nb_rangees"><br>
        <label for="siege">Nombre de sièges par rangée</label>
        <input type="integer" id="siege" name="nb_sieges"><br>

        <label>Créer</label>
        <input type="submit">

    </form>