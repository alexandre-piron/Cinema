<?php

namespace App\Http\Controllers\API;

use App\Models\Rate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRateRequest;
use App\Http\Requests\UpdateRateRequest;
use App\Http\Resources\Api\v1\RateResource;
use App\Http\Resources\API\v1\RateCollection;

class RateController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Rate::class, 'rate');
    }
    /**
     * Disrate a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new RateCollection(Rate::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRateRequest $request)
    {
        $rate = Rate::create($request->validated());
        return response()->json(['success' => true, 'msg' => 'Rate créée', 'rate' => new RateResource($rate)], 201);
    }

    /**
     * Disrate the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        return new RateResource($rate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRateRequest $request, Rate $rate)
    {
        $rate->update($request->validated());
        return response()->json(['success' => true, 'msg' => 'Rate mis à jour', 'rate' => new RateResource($rate)], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        $rate->delete();
        return response()->json(['sucess' => true, 'msg' => 'Rate supprimé'], 200);
    }
}