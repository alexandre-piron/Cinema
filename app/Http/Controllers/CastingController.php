<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCastingRequest;
use App\Http\Requests\UpdateCastingRequest;
use App\Models\Casting;

class CastingController extends Controller
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
     * @param  \App\Http\Requests\StoreCastingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCastingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Casting  $casting
     * @return \Illuminate\Http\Response
     */
    public function show(Casting $casting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Casting  $casting
     * @return \Illuminate\Http\Response
     */
    public function edit(Casting $casting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCastingRequest  $request
     * @param  \App\Models\Casting  $casting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCastingRequest $request, Casting $casting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Casting  $casting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Casting $casting)
    {
        //
    }
}
