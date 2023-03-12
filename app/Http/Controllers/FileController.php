<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorefileRequest;
use App\Http\Requests\UpdatefileRequest;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\FileResource;

class FileController extends Controller
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
     * @param  \App\Http\Requests\StorefileRequest  $request
     * @return \App\Http\Resources\FileResource
     */
    public function store(StorefileRequest $request)
    {
        $file = request()->file('file');
        $ext = $file->extension();
        $originalName = $file->getClientOriginalName();
        $path = $file->store('public/' . $ext);

        $fileCreated = File::create([
            'path' => $path,
            'bucket' => 'local',
            'extension' => $ext,
            'original_filename' => $originalName
        ]);

        return new FileResource($fileCreated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(file $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(file $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefileRequest  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefileRequest $request, file $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(file $file)
    {
        //
    }
}
