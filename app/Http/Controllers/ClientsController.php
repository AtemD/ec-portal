<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\ContractStatus;
use App\Models\Platform;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with([
            'contractStatus',
            'contacts',
            'platforms', 
            'sites'
        ])->paginate(15);
        
        return view('clients/index', compact('clients'));
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
    public function store(StoreClientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $client = $client->load([
            'contractStatus',
            'contacts',
            'platforms', 
            'sites'
        ]);
        
        // dd($client->platforms);
        $contract_statuses = ContractStatus::all();
        $platforms = Platform::all();
        // dd($client->toArray());
        // dd($client->platforms->contains('name', 'C-Band'));

        return view('clients/show', compact('client', 'contract_statuses', 'platforms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $client = $client->load([
            'contractStatus',
            'contacts',
            'platforms', 
            'sites'
        ]);
        
        return view('clients/edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
