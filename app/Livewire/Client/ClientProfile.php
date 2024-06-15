<?php

namespace App\Livewire\Client;

use App\Models\Client;
use App\Models\ContractStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ClientProfile extends Component
{
    public Client $client;

    public Collection $contractStatuses;

    public string $name = '';

    public int $contract_status;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'contract_status' => ['required', 'integer', 'max:1000', Rule::exists(ContractStatus::class, 'id')],
        ];
    }

    public function mount(Client $client)
    {
        // load client contract status
        $this->client = $client->load('contractStatus');

        // set attributes of the client
        $this->name = $client->name;
        $this->contract_status = $client->contract_status_id;

        // get all contract statuses from the database
        $this->contractStatuses = ContractStatus::all();
    }

    public function refresh()
    {
    }

    public function closeModal()
    {
    }

    public function updateClientProfile()
    {
        // Authorize if the user is allowed to update this clients profile
        // $this->authorize('update', $client);

        $validatedData = $this->validate();

        try {
            Client::whereId($this->client->id)->update([
                'name' => $validatedData['name'],
                'contract_status_id' => $validatedData['contract_status'],
            ]);
            session()->flash('success', 'Client profile successfully updated!');
            $this->refresh();
        } catch (\Exception $ex) {
            session()->flash('error', ' Error, there was an error with the update!');
        }
    }

    public function render()
    {
        return view('livewire.client.client-profile');
    }
}
