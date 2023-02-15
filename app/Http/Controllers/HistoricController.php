<?php

namespace App\Http\Controllers;

use App\Models\Historic;
use App\Http\Requests\StoreHistoricRequest;
use App\Http\Requests\UpdateHistoricRequest;

class HistoricController extends Controller
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
     * @param  \App\Http\Requests\StoreHistoricRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHistoricRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historic  $historic
     * @return \Illuminate\Http\Response
     */
    public function show(Historic $historic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Historic  $historic
     * @return \Illuminate\Http\Response
     */
    public function edit(Historic $historic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHistoricRequest  $request
     * @param  \App\Models\Historic  $historic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHistoricRequest $request, Historic $historic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historic  $historic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historic $historic)
    {
        //
    }
}
