<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($cinema->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul><p>Salles</p><br>
                        @foreach ($rooms as $room)
                            <li><a href="{{ route('room.show', $room->id) }}">Salle {{ $room->name }}</a></li>
                        @endforeach
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
                                    <a href="{{route('food.edit', $food->id)}}">Editer</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    <a href="{{route('sell.edit', $cinema->id)}}">Editer les snacks vendus dans le cinéma</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>