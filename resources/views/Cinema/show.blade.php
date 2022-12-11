<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('dashboard', $cinema->id)}}"> {{ __($cinema->name) }} </a>
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
                                    <th scope="col">{{__('Editer')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td><a href="{{ route('room.show', $room->id) }}">{{$room->name}}</a></td>
                                        <td>
                                        <a href="{{route('room.edit', $room->id)}}">Editer</a>
                                        </td>
                                        <td><a href="{{route('room.destroy', $room->id)}}">Supprimer</a></td>
                                    </tr>
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