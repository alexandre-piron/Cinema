<?php

namespace App\Http\Controllers\API;

use App\Models\Sell;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSellRequest;
use App\Http\Requests\UpdateSellRequest;
use App\Http\Resources\Api\v1\SellResource;
use App\Http\Resources\API\v1\SellCollection;

class SellController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Sell::class, 'sell');
    }
    /**
     * Dissell a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SellCollection(Sell::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellRequest $request)
    {
        $sell = Sell::create($request->validated());
        return response()->json(['success' => true, 'msg' => 'Sell créée', 'sell' => new SellResource($sell)], 201);
    }

    /**
     * Dissell the specified resource.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function show(Sell $sell)
    {
        return new SellResource($sell);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellRequest $request, Sell $sell)
    {
        $sell->update($request->validated());
        return response()->json(['success' => true, 'msg' => 'Sell mis à jour', 'sell' => new SellResource($sell)], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sell $sell)
    {
        $sell->delete();
        return response()->json(['sucess' => true, 'msg' => 'Sell supprimé'], 200);
    }
}