<?php

namespace App\Http\Controllers;

use App\Models\user_information;
use App\Http\Requests\Storeuser_informationRequest;
use App\Http\Requests\Updateuser_informationRequest;

class UserInformationController extends Controller
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
     * @param  \App\Http\Requests\Storeuser_informationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeuser_informationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_information  $user_information
     * @return \Illuminate\Http\Response
     */
    public function show(user_information $user_information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_information  $user_information
     * @return \Illuminate\Http\Response
     */
    public function edit(user_information $user_information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateuser_informationRequest  $request
     * @param  \App\Models\user_information  $user_information
     * @return \Illuminate\Http\Response
     */
    public function update(Updateuser_informationRequest $request, user_information $user_information)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_information  $user_information
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_information $user_information)
    {
        //
    }
}
