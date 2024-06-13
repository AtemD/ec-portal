<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Client;
use App\Models\ContractStatus;
use Illuminate\Database\Eloquent\Collection;

class ClientProfile extends Component
{
    public Client $client;
    public Collection $contractStatuses;
    public string $name = "";
    public int $contract_status;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'contract_status' => ['required', 'integer', 'max:1000', Rule::exists(ContractStatus::class, 'id')],
        ];
    }

    public function mount(Client $client, Collection $contractStatuses)
    {
        $this->name = $client->name;
        $this->contract_status = $client->contract_status_id;
        
        $this->client = $client;
        $this->contractStatuses = $contractStatuses;
    }

    public function refresh() {}

    public function closeModal()
    {

    }

    public function updateClientProfile()
    {
        // Authorize if the user is allowed to update this clients profile 
        // $this->authorize('update', $client); 
        $validatedData = $this->validate();

        try{
            Client::whereId($this->client->id)->update([
                'name' => $validatedData['name'],
                'contract_status_id' => $validatedData['contract_status'],
            ]);
            session()->flash('success','Client profile successfully updated!');
            $this->refresh();
        } catch (\Exception $ex) {
            session()->flash('error',' Error, there was an error with the update!');
        }
    }

    public function updatePlatform()
    {
        // Authorize if the user is allowed to delete this platform 
        // $this->authorize('update', $platform); 

        $validatedData = $this->validate();

        try {
            Platform::whereId($this->platform->id)->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description']
            ]);
            session()->flash('success','Platform successfully updated!');
            
        } catch (\Exception $ex) {
            session()->flash('error',' Error, something gone wrong!');
        }
    }

    public function render()
    {
        return view('livewire.client.client-profile');
    }
}
