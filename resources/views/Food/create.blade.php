<form action="{{ route('food.store') }}" method="POST">
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
        <label for="name">Nom du snack</label>
        <input type="text" id="name" name="name"><br>
        <label for="desc">Description</label>
        <input type="text" id="desc" name="description"><br>
        <label for="prix">Prix en euros</label>
        <input type="text" id="prix" name="prix"><br>

        <label>Créer</label>
        <input type="submit">

    </form>