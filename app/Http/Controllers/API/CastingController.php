<?php

namespace App\Http\Controllers\API;

use App\Models\Casting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCastingRequest;
use App\Http\Requests\UpdateCastingRequest;
use App\Http\Resources\Api\v1\CastingResource;
use App\Http\Resources\API\v1\CastingCollection;

class CastingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Casting::class, 'casting');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CastingCollection(Casting::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCastingRequest $request)
    {
        $casting = Casting::create($request->validated());
        return response()->json(['success' => true, 'msg' => 'Casting créée', 'casting' => new CastingResource($casting)], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Casting  $casting
     * @return \Illuminate\Http\Response
     */
    public function show(Casting $casting)
    {
        return new CastingResource($casting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Casting  $casting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCastingRequest $request, Casting $casting)
    {
        $casting->update($request->validated());
        return response()->json(['success' => true, 'msg' => 'Casting mis à jour', 'casting' => new CastingResource($casting)], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Casting  $casting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Casting $casting)
    {
        $casting->delete();
        return response()->json(['sucess' => true, 'msg' => 'Casting supprimé'], 200);
    }
}