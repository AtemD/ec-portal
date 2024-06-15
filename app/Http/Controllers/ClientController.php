<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\ContractStatus;

class ClientController extends Controller
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
            'sites',
        ])->paginate(15);

        $contract_statuses = ContractStatus::select('id', 'name', 'color')->get();

        return view('clients/index', compact('clients', 'contract_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        // Retrieve a portion of the validated input data...
        $validated = $request->safe()->only(['name', 'contract_status']);

        // Store the client
        $client = Client::create([
            'name' => $validated['name'],
            'contract_status' => $validated['contract_status'],
        ]);

        // redirect
        return redirect()
            ->route('clients.contacts.create', ['client' => $client])
            ->with('success', 'Client Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients/show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
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
