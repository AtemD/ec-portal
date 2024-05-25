<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Http\Requests\StorePlatformRequest;
use App\Http\Requests\UpdatePlatformRequest;

class PlatformsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platforms = Platform::paginate(10);
        // dd($platforms);
        return view('platforms/index', compact('platforms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlatformRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Platform $platform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Platform $platform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlatformRequest $request, Platform $platform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Platform $platform)
    {
        //
    }
}
