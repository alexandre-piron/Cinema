<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBroadcastRequest;
use App\Http\Requests\UpdateBroadcastRequest;
use App\Models\Broadcast;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBroadcastRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBroadcastRequest $request)
    {
        //
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
    public function edit(Broadcast $broadcast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBroadcastRequest  $request
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBroadcastRequest $request, Broadcast $broadcast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Broadcast $broadcast)
    {
        //
    }
}
