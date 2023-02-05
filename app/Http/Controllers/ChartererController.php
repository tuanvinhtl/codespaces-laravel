<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChartererRequest;
use App\Http\Requests\UpdateChartererRequest;
use App\Models\Charterer;

class ChartererController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'charterers';
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
     * @param  \App\Http\Requests\StoreChartererRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChartererRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Charterer  $charterer
     * @return \Illuminate\Http\Response
     */
    public function show(Charterer $charterer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Charterer  $charterer
     * @return \Illuminate\Http\Response
     */
    public function edit(Charterer $charterer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChartererRequest  $request
     * @param  \App\Models\Charterer  $charterer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChartererRequest $request, Charterer $charterer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Charterer  $charterer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Charterer $charterer)
    {
        //
    }
}
