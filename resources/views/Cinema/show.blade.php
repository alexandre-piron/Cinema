<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('home')}}"> {{ __($cinema->name) }} </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul><p>Salles</p><br>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope="col">{{__('Nom de la salle')}}</th>
                                    <th scope="col">{{__('Diffusion')}}</th>
                                    <th scope="col">{{__('Date de diffusion')}}</th>
                                    <th scope="col">{{__('Places restantes')}}</th>
                                    <th scope="col">{{__('Editer')}}</th>
                                    <th scope="col">{{__('Supprimer')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td><a href="{{ route('room.show', $room->id) }}">{{$room->name}}</a></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <a href="{{route('room.edit', $room->id)}}"><div class="image"><img src="/images/ico_settings.png"></div></a>
                                        </td>
                                        <td><a href="{{route('room.destroy', $room->id)}}"><div class="image"><img src="/images/ico_delete.png"></div></a></td>
                                    </tr>
                                    @foreach($broadcasts as $broadcast)
                                        @if($room->id==$broadcast->id_room)
                                            @foreach($movies as $movie)
                                                @if($movie->id==$broadcast->id_movie)
                                                    <tr>
                                                        <td>--</td>
                                                        <td>{{$movie->name}}</td>
                                                        <td>{{$broadcast->The_date}}</td>
                                                        @foreach($rooms as $room0) 
                                                            @php($nbplaces=$room0->nb_sieges*$room0->nb_rangees)
                                                            @php($places_occupees=0)
                                                            @foreach($books as $book)
                                                                @if($book->id_broadcast==$broadcast->id)
                                                                    @php($places_occupees+=1)
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                        <td>{{$nbplaces-$places_occupees}}/{{$nbplaces}}</td>
                                                        <td>
                                        <a href="{{route('broadcasts.edit', $broadcast->id)}}"><div class="image"><img src="/images/ico_settings.png"></div></a>
                                        </td>
                                        <td><a href="{{route('broadcasts.destroy', $broadcast->id)}}"><div class="image"><img src="/images/ico_delete.png"></div></a></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table><br>
                        <a href="{{route('room.create', $cinema->id)}}">Créer une nouvelle salle</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope="col">{{__('Nom')}}</th>
                                <th scope="col">{{__('Description')}}</th>
                                <th scope="col">{{__('Prix')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $food)
                                <tr>
                                    <td> {{$food->name}} </td>
                                    <td> {{$food->description}} </td>
                                    <td> {{$food->prix}} € </td>
                                    <td>
                                    <a href="{{route('food.edit', ['food' => $food->id, 'cinema' => $cinema->id])}}"><div class="image"><img src="/images/ico_settings.png"></div></a>
                                    </td>
                                    @foreach($sells as $sell)
                                        @if($sell->id_food == $food->id)
                                            <td><a href="{{route('sell.destroy', $sell->id)}}"><div class="image"><img src="/images/ico_delete.png"></div></a></td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    <a href="{{route('sell.create', $cinema->id)}}">Vendre de nouveaux snacks dans le cinéma</a><br>
                    <a href="{{route('food.create', $cinema->id)}}">Enregistrer de nouveaux snacks</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>