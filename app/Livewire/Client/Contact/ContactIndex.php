<?php

namespace App\Livewire\Client\Contact;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Client;

class ContactIndex extends Component
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

    public function closeModal()
    {
        $this->reset(['name', 'email', 'phone_number']);
    }

    public function render()
    {
        return view('livewire.client.contact.contact-index');
    }
}
