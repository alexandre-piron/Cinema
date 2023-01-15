<?php

namespace App\Http\Controllers\API;

use App\Models\Play;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayRequest;
use App\Http\Requests\UpdatePlayRequest;
use App\Http\Resources\Api\v1\PlayResource;
use App\Http\Resources\API\v1\PlayCollection;

class PlayController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Play::class, 'play');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PlayCollection(Play::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayRequest $request)
    {
        $play = Play::create($request->validated());
        return response()->json(['success' => true, 'msg' => 'Play créée', 'play' => new PlayResource($play)], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Play  $play
     * @return \Illuminate\Http\Response
     */
    public function show(Play $play)
    {
        return new PlayResource($play);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Play  $play
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlayRequest $request, Play $play)
    {
        $play->update($request->validated());
        return response()->json(['success' => true, 'msg' => 'Play mis à jour', 'play' => new PlayResource($play)], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Play  $play
     * @return \Illuminate\Http\Response
     */
    public function destroy(Play $play)
    {
        $play->delete();
        return response()->json(['sucess' => true, 'msg' => 'Play supprimé'], 200);
    }
}