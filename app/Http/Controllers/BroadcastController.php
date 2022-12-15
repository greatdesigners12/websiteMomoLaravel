<?php

namespace App\Http\Controllers;

use App\Models\broadcast;
use App\Http\Requests\StorebroadcastRequest;
use App\Http\Requests\UpdatebroadcastRequest;

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
     * @param  \App\Http\Requests\StorebroadcastRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebroadcastRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function show(broadcast $broadcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function edit(broadcast $broadcast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebroadcastRequest  $request
     * @param  \App\Models\broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebroadcastRequest $request, broadcast $broadcast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(broadcast $broadcast)
    {
        //
    }
}
