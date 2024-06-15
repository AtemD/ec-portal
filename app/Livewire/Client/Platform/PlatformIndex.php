<?php

namespace App\Livewire\Client\Platform;

use App\Models\Client;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PlatformIndex extends Component
{
    public Client $client;
    public array $platforms = [];
    public array $allPlatforms = [];
    public array $clientPlatforms = [];

    public function rules()
    {
        return [
            'platforms' => ['array', 'min:1'], 
            'platforms.*' => ['exists:platforms,id'],
        ];
    }

    public function mount(Client $client)
    {
        $this->client = $client;

        // Initialize platforms with the client's current platforms
        $this->platforms = $client->platforms->pluck('id')->toArray();
        $this->allPlatforms = Platform::all()->toArray();
        $this->clientPlatforms = $client->platforms->toArray();
    }

    public function storePlatform()
    {
        // Authorize if the user is allowed to create a contact
        // Authorize code here..
       
        $validatedData = $this->validate();
        
        $platforms = $this->client->platforms()->sync($validatedData['platforms']);

        if ($platforms) {
            session()->flash('success', 'platforms updated successfully.');
        } else {
            session()->flash('error', ' Error storing this record.');
        }

    }

    public function closeModal()
    {

    }

    public function render()
    { 
        // $clientPlatforms = $this->client->platforms()->get();
        // dd($clientPlatforms->contains('name', 'C-Band'));
        return view('livewire.client.platform.platform-index', [
            'client' => $this->client,
            'allPlatforms' => Platform::all(), // Pass all platforms to the view
            'clientPlatforms' => $this->client->platforms,
        ]);
    }
}
