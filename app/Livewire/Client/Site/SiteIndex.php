<?php

namespace App\Livewire\Client\Site;

use App\Models\Client;
use App\Models\Site;
use Livewire\Component;
use Livewire\WithPagination;

class SiteIndex extends Component
{
    use WithPagination;

    public string $name;

    public Client $client;

    public Site $site;

    public function rules()
    {
        return [
            'name' => ['required'],
        ];
    }

    public function mount(Client $client)
    {
        $this->client = $client;
    }

    public function createSite()
    {
        $this->resetFields();
    }

    public function storeSite()
    {
        // Authorize if the user is allowed to create a contact
        // Authorize code here..

        $validatedData = $this->validate();

        $site = $this->client->sites()->create([
            'name' => $validatedData['name'],
        ]);

        if ($site) {
            session()->flash('success', 'Site added successfully.');
            $this->resetFields();
        } else {
            session()->flash('error', ' Error creating this site.');
        }

    }

    public function editSite($site)
    {
        // Authorize if the user is allowed to edit a site
        // Authorize code here..

        $site = Site::findOrFail($site['id']);

        if ($site->exists()) {
            $this->site = $site;
            $this->name = $site->name;
        } else {
            session()->flash('error', ' Error editing site!');
        }
    }

    public function updateSite()
    {
        // Authorize if the user is allowed to edit a site
        // Authorize code here..

        $validatedData = $this->validate();

        try {
            $this->site->updateOrFail([
                'name' => $validatedData['name'],
            ]);
            session()->flash('success', ' Site successfully updated!');
        } catch (\Exception $ex) {
            session()->flash('error', ' Error with site update!');
        }
    }

    public function deleteSite(Site $site)
    {
        // Authorize if the user is allowed to delete Site
        // Authorize code here..

        // Find and delete the Site
        if ($site->deleteOrFail() === true) {
            session()->flash('success', 'Site deleted successfully.');
            $this->previousPage();
        } else {
            session()->flash('error', 'Error deleting this site.');
        }

    }

    public function refresh()
    {
    }

    public function closeModal()
    {
        $this->resetFields();
    }

    public function openModal()
    {
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->reset(['name']);
    }

    public function render()
    {
        return view('livewire.client.site.site-index', [
            'sites' => Site::where('client_id', '=', $this->client->id)->paginate(3, pageName: 'site-index'),
        ]);
    }
}
