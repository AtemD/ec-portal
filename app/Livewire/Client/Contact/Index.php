<?php

namespace App\Livewire\Client\Contact;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Client;

class Index extends Component
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


    #[On('client-contact-created')] 
    public function updateClientContactList() 
    {
        
    }

    public function closeModal()
    {
        $this->reset(['name', 'email', 'phone_number']);
    }

    public function render()
    {
        return view('livewire.client.contact.index');
    }
}
