<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Movie;
use App\Models\Broadcast;
use App\Http\Requests\StoreBroadcastRequest;
use App\Http\Requests\UpdateBroadcastRequest;

class BroadcastController extends Controller
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
    public function create(Room $room)
    {
        $movies = Movie::all();
        return view('broadcasts.create', compact('room', 'movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBroadcastRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBroadcastRequest $request)
    {
        Broadcast::create($request->all());
        return redirect()->action(
            [RoomController::class, 'show'], ['room' => $request->id_room]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function show(Broadcast $broadcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function edit(Broadcast $diffusion)
    {
        return view('broadcasts.edit', compact('diffusion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBroadcastRequest  $request
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBroadcastRequest $request, Broadcast $diffusion)
    {
        $broadcast=Broadcast::find($request->id);
        $broadcast->fill($request->input());
        $broadcast->save();
        return redirect()->action(
            [RoomController::class, 'show'], ['room' => $diffusion->id_room]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Broadcast $diffusion)
    {
        Broadcast::destroy($diffusion->id);
        return redirect()->action(
            [RoomController::class, 'show'], ['room' => $diffusion->id_room]
        );
    }
}
