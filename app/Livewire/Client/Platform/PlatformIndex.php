<?php

namespace App\Livewire\Client\Platform;

use App\Models\Client;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PlatformIndex extends Component
{
    public Client $client;

    public Collection $platforms;

    public function mount(Client $client)
    {
        $this->client = $client;
        $this->platforms = Platform::all();
    }

    public function storePlatform()
    {

    }

    public function updatePlatform()
    {
        // Authorize if the user is allowed to delete this platform
        // $this->authorize('update', $platform);

        $validatedData = $this->validate();

        try {
            Platform::whereId($this->platform->id)->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
            ]);
            session()->flash('success', 'Platform successfully updated!');

        } catch (\Exception $ex) {
            session()->flash('error', ' Error, something gone wrong!');
        }
    }

    public function closeModal()
    {

    }

    public function render()
    {
        return view('livewire.client.platform.platform-index', [
            'platforms' => Platform::paginate(10),
        ]);
    }
}
