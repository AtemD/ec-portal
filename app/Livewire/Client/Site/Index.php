<?php

namespace App\Livewire\Client\Site;

use App\Models\Client;
use App\Models\Site;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public Client $client;

    public function mount($client)
    {
        $this->client = $client;
    }

    #[On('client-site-created')]
    public function updateClientSiteList()
    {

    }

    public function deleteClientSite($id)
    {
        Site::find($id)->delete();
        session()->flash('success', 'Site Deleted Successfully.');
    }

    public function render()
    {
        return view('livewire.client.site.index');
    }
}
