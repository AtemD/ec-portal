<?php

use App\Models\Client;
use App\Models\ContractStatus;
use Livewire\Volt\Component;
use Livewire\Volt\Mount;
use Livewire\Volt\Attributes\Validate; 
use Livewire\Volt\Rules;

new class extends Component
{

    public string $name;
    public string $contract_status;

    public object $contract_statuses;

    public function rules()
    {
        return [
            'name' => ['required'],
            'contract_status' => ['required'],
        ];
    }

    public function mount($contract_statuses) 
    {
        $this->contract_statuses = $contract_statuses;
    }

    public function saveClient()
    {
        $this->validate(); 

        $client = Client::create([
            'name' => $this->name,
            'contract_status_id' => $this->contract_status
        ]);


        if($client->exists()){
            session()->flash('success', 'Client added successfully.');
            $this->reset(['name', 'contract_status']);

            return $this->redirectRoute('client.contact.create', ['client' => $client]);
        } else {
            session()->flash('error', ' Error, please try again.');
        }
        
    }

    public function closeModal()
    {
        $this->reset(['name', 'contract_status']);
    }

}; ?>

<div class="card-tools">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus xs"></i>
        Add Client
    </button>

    <div wire:ignore.self class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Client</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  wire:submit.prevent="save">
                    <div class="modal-body">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label">Client Name</label>
                            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name')}}" placeholder="Enter client name">

                            @error('name')
                            <div class="invalid-feedback text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contract_status" class="form-label">Contract Status</label>

                            <select wire:model="contract_status" class="form-select form-control @error('contract_status') is-invalid @enderror" id="contract_status" name="contract_status" required="">
                                <option selected="" value="">Choose...</option>
                                @forelse ($contract_statuses as $status)
                                <option wire:key="{{ $status->id }}" value="{{$status->id}}" {{ old('contract_status')==$status->id  ? ' selected' : '' }}>{{ $status->name }}</option>
                                @empty
                                <option>...Error, no contract status available</option>
                                @endforelse
                            </select>

                            @error('contract_status')
                            <div class="invalid-feedback text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button wire:click="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button wire:click="saveClient" type="button" class="btn btn-primary">Add Client</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>