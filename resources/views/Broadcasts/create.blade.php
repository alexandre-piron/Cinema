<form action="{{ route('broadcasts.store') }}" method="POST">
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
        <label for="movie">Films</label>
        <select name="id_movie" id="movie">
            @foreach ($movies as $movie)
                <option value="{{ $movie->id }}">{{ $movie->name }}</option>
            @endforeach
        </select><br>
        <label for="date">Date de diffusion</label>
        <input type="date" id="date" name="The_date"><br>
        <input name="id_room" hidden value="{{$room->id}}">

        <label>Créer</label>
        <input type="submit">

    </form>