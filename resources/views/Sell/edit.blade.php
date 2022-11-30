<table class='table'>

    <form action="{{route('sell.update', $food->id) }}" method="POST">
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
        
        <input type="hidden" id="id" name="id" value="{{ $food->id }}"><br>
        <label for="nom">Nom du snack</label>
        <input type="text" id="name" name="name" value="{{ $food->name }}"><br>
        <label for="nom">Description</label>
        <input type="text" id="description" name="description" value="{{ $food->description }}"><br>
        <label for="nom">Prix en euros</label>
        <input type="text" id="prix" name="prix" value="{{ $food->prix }}"><br>

        <input id="sub" type="submit">
    </form>
</table>