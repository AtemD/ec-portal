<?php

namespace App\Livewire\Client\Contact;

use Livewire\Component;

use App\Models\Client;

class ContactCreate extends Component
{
    public string $name;
    public string $email;
    public string $phone_number;

    public Client $client;

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required']
        ];
    }

    public function mount($client) 
    {
        $this->client = $client;
    }

    public function createClientContact()
    {
        $this->validate(); 

        $contact = $this->client->contacts()->create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
        ]);

        if($contact->exists()){
            session()->flash('success', 'Contact added successfully.');
            $this->reset(['name', 'email', 'phone_number']);
            $this->dispatch('client-contact-created'); 
        } else {
            session()->flash('error', ' Error, please try again.');
        }
        
    }

    public function closeModal()
    {
        $this->reset(['name', 'email', 'phone_number']);
    }

    public function render()
    {
        return view('livewire.client.contact.contact-create');
    }
}
