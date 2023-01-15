<?php

namespace App\Http\Controllers\API;

use App\Models\Broadcast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBroadcastRequest;
use App\Http\Requests\UpdateBroadcastRequest;
use App\Http\Resources\Api\v1\BroadcastResource;
use App\Http\Resources\API\v1\BroadcastCollection;

class BroadcastController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Broadcast::class, 'broadcast');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new BroadcastCollection(Broadcast::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBroadcastRequest $request)
    {
        $broadcast = Broadcast::create($request->validated());
        return response()->json(['success' => true, 'msg' => 'Diffusion créée', 'broadcast' => new BroadcastResource($broadcast)], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function show(Broadcast $broadcast)
    {
        return new BroadcastResource($broadcast);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBroadcastRequest $request, Broadcast $broadcast)
    {
        $broadcast->update($request->validated());
        return response()->json(['success' => true, 'msg' => 'Diffusion mise à jour', 'broadcast' => new BroadcastResource($broadcast)], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Broadcast $broadcast)
    {
        $broadcast->delete();
        return response()->json(['sucess' => true, 'msg' => 'Diffusion supprimée'], 200);
    }
}
