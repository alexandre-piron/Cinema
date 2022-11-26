
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
                    <div class="grille">
                        <div class="ligne" id="ecran"><img src="/images/ecran.png"></div>
                        @for($l=0; $l < 3; $l++)
                        <div class="ligne">
                            @for($c=0; $c < 5; $c++)
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