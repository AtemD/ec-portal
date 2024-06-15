<?php

namespace App\Livewire\Client\Site;

use App\Models\Client;
use Livewire\Component;

class Create extends Component
{
    public string $name;

    public Client $client;

    public function rules()
    {
        return [
            'name' => ['required'],
        ];
    }

    public function mount($client)
    {

        $this->client = $client;
    }

    public function closeModal()
    {
        $this->reset(['name']);
    }

    public function createClientSite()
    {
        $this->validate();

        $site = $this->client->sites()->create([
            'name' => $this->name,
        ]);

        if ($site->exists()) {
            session()->flash('success', 'Site '.$site->name.' added successfully.');
            $this->reset(['name']);
            $this->dispatch('client-site-created');
        } else {
            session()->flash('error', ' Error, please try again.');
        }

    }

    public function render()
    {
        return view('livewire.client.site.create');
    }
}
