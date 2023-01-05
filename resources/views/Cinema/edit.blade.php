<table class='table'>

    <form action="{{route('cinema.update', $cinema->id) }}" method="POST">
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
        
        <input type="hidden" id="id" name="id" value="{{ $cinema->id }}"><br>
        <label for="nom">Nom du cinéma</label>
        <input type="text" id="nom" name="name" value="{{ $cinema->name }}"><br>

        <input id="sub" type="submit">
    </form>
</table>