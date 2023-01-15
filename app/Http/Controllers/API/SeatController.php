<?php

namespace App\Http\Controllers\API;

use App\Models\Seat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSeatRequest;
use App\Http\Requests\UpdateSeatRequest;
use App\Http\Resources\Api\v1\SeatResource;
use App\Http\Resources\API\v1\SeatCollection;

class SeatController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Seat::class, 'seat');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SeatCollection(Seat::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeatRequest $request)
    {
        $seat = Seat::create($request->validated());
        return response()->json(['success' => true, 'msg' => 'Siège créé', 'seat' => new SeatResource($seat)], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        return new SeatResource($seat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeatRequest $request, Seat $seat)
    {
        $seat->update($request->validated());
        return response()->json(['success' => true, 'msg' => 'Siège mis à jour', 'seat' => new SeatResource($seat)], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        $seat->delete();
        return response()->json(['sucess' => true, 'msg' => 'Siège supprimé'], 200);
    }
}