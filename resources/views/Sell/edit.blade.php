<table class='table'>

    <form action="{{route('sell.update')}}" method="POST">
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
        
        <input type="hidden" name="id_cinema" value="{{ $cinema->id }}"><br>
        <label for="nom">Nom du snack</label>
        <select id="name" name="id_food">
            @foreach($foods as $food)
                <option value="{{ $food->id }}">{{ $food->name }} : {{ $food->prix }}€</option>
            @endforeach
        </select><br>

        <input id="sub" type="submit">
    </form>
</table>