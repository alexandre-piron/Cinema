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
        <label for="nom">Nom de la salle</label>
        <input type="text" id="name" name="name" value="{{ $room->name }}"><br>

        <input id="sub" type="submit">
    </form>
</table>