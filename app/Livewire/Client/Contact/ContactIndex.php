<?php

namespace App\Livewire\Client\Contact;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Client;
use App\Models\Contact;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Collection;

class ContactIndex extends Component
{
    use WithPagination;

    public string $name;
    public string $email;
    public string $phone_number;
    public Client $client;
    public Contact $contact;

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required']
        ];
    }

    public function mount(Client $client)
    {
        $this->client = $client;
    }

    public function createContact()
    {
        // Authorize if the user is allowed to create a contact
        // Authorize code here..

        $validatedData = $this->validate(); 

        $contact = $this->client->contacts()->create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
        ]);

        if($contact){
            session()->flash('success', 'Contact added successfully.');
            $this->reset(['name', 'email', 'phone_number']);
            $this->dispatch('client-contact-created'); 
        } else {
            session()->flash('error', ' Error creating this record.');
        }
        
    }

    public function editContact($contact)
    {
        // Authorize if the user is allowed to edit a contact
        // Authorize code here..

        // Find and delete the contact
        $contact = Contact::findOrFail($contact['id']);

        if($contact->exists()){
            $this->contact = $contact;
            $this->name = $contact->name;
            $this->email = $contact->email;
            $this->phone_number = $contact->phone_number;
        }else {
            session()->flash('error', ' Error, something gone wrong.');
        }
        
    }

    public function deleteContact(Contact $contact)
    {
        // Authorize if the user is allowed to delete contact
        // Authorize code here..

        // Find and delete the contact
        if ($contact->deleteOrFail() === true) {
            session()->flash('success', 'Contact deleted successfully.');
            $this->dispatch('client-contact-deleted');
            $this->closeModal();
        } else {
            session()->flash('error', 'Error deleting this record.');
       }
       
    }

    public function closeModal()
    {
        $this->resetFields();
    }

    public function openModal()
    {
        $this->resetFields();
    }

    public function resetFields(){
        $this->reset(['name', 'email','phone_number']);
    }

    public function render()
    {
        return view('livewire.client.contact.contact-index');
    }

}
