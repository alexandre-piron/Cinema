<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Seat;
use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Broadcast;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cinema $cinema)
    {
        return view('room.create', compact('cinema'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        Room::create($request->all());
        return view('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $seats = Seat::all()->where('id_room', $room->id);
        $movies_id = Broadcast::all()->where('id_room', $room->id)->pluck('id_movie', 'id_movie'); //pluck permet d'extraire seulement les valeurs de la colonne 'id_movie'
        $movies = Movie::all()->whereIn('id', $movies_id);
        $diffusions=Broadcast::all()->where('id_room',$room->id);
        return view('room.show', compact('seats','room','movies'))->with(compact('diffusions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $room=Room::find($request->id);
        $room->fill($request->input());
        $room->save();
        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
