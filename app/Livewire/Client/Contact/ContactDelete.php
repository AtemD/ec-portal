<?php

namespace App\Livewire\Client\Contact;

use Livewire\Component;
use App\Models\Contact;

class ContactDelete extends Component
{
    public Contact $contact;

    public function mount($contact) 
    {
        $this->contact = $contact;
    }

    public function deleteContact(Contact $contact)
    {
        // Authorize if the user is allowed to delete contact
        // Authorize code here..

        // Find and delete the contact
        if ($contact->deleteOrFail() === true) {
            session()->flash('success', 'Contact Deleted Successfully.');
            $this->dispatch('client-contact-deleted');
            $this->closeModal();
        } else {
            session()->flash('error', 'Error Deleting This Record.');
       }
       
    }

    public function closeModal()
    {
        // renders the view
    }

    public function render()
    {
        return view('livewire.client.contact.contact-delete');
    }
}
