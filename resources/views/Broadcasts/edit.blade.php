<table class='table'>

    <form action="{{route('broadcasts.update', $diffusion->id) }}" method="POST">
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
        
        <input type="hidden" id="id" name="id" value="{{ $diffusion->id }}"><br>
        <label for="date">Date de diffusion</label>
        <input type="date" id="date" name="The_date" value="{{$diffusion->The_date}}"><br>

        <input id="sub" type="submit">
    </form>
</table>