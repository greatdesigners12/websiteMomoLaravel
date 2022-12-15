<?php

namespace App\Http\Controllers;

use App\Models\Favorite_product;
use App\Http\Requests\StoreFavorite_productRequest;
use App\Http\Requests\UpdateFavorite_productRequest;

class FavoriteProductController extends Controller
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
     * @param  \App\Http\Requests\StoreFavorite_productRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFavorite_productRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite_product  $Favorite_product
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite_product $Favorite_product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite_product  $Favorite_product
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite_product $Favorite_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavorite_productRequest  $request
     * @param  \App\Models\Favorite_product  $Favorite_product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavorite_productRequest $request, Favorite_product $Favorite_product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite_product  $Favorite_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite_product $Favorite_product)
    {
        //
    }
}
