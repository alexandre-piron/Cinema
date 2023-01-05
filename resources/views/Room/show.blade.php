
@vite('resources/css/Room/show.css')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p>Salle {{ __($room->name) }}</p>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul><p>Films diffusés</p><br>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope="col">{{__('Nom du film')}}</th>
                                    <th scope="col">{{__('Date de diffusion')}}</th>
                                    <th scope="col">{{__('Modifier')}}</th>
                                    <th scope="col">{{__('Supprimer')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($movies as $movie)
                                    <tr>
                                        <td>{{$movie->name}}</td>
                                        @foreach($diffusions as $diffusion)
                                            @php($nom=$movie->name)
                                            @php($shown=false)
                                            @if($diffusion->id_movie == $movie->id && !$shown)
                                                @php($shown=true)
                                                <td>{{$diffusion->The_date}}</td>
                                                <td><a href="{{route('broadcasts.edit', $diffusion->id)}}">Modifier</a></td>
                                                <td><a href="{{route('broadcasts.destroy', $diffusion->id)}}">Supprimer</a></td>
                                                </tr>
                                            @elseif($diffusion->id_movie == $movie->id && $shown)
                                                <tr>
                                                <td>{{$nom}}</td>
                                                <td>{{$diffusion->The_date}}</td>
                                                <td><a href="{{route('broadcasts.edit', $diffusion->id)}}"><div class="image"><img src="/images/ico_settings.png"></div></a></td>
                                                <td><a href="{{route('broadcasts.destroy', $diffusion->id)}}"><div class="image"><img src="/images/ico_delete.png"></div></a></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                @endforeach
                            </tbody>
                        </table><br>
                        <a href="{{route('broadcasts.create', $room->id)}}">Créer une nouvelle diffusion</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grille">
                        <div class="ligne" id="ecran"><img src="/images/ecran.png"></div>
                        @for($l=0; $l < $room->nb_rangees; $l++)
                        <div class="ligne">
                            @for($c=0; $c < $room->nb_sieges; $c++)
                            <div class="colonne">
                                @php ($siege='/images/seatEmpty.jpg')
                                @foreach($seats as $seat)
                                    @if(($c == $seat->colonne-1) && ($l == $seat->line-1))
                                    @php ($siege='/images/seat.jpg')
                                    @endif
                                @endforeach
                                <img src="{{ $siege }}">
                            </div>
                            @endfor
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>