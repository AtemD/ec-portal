<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">Contacts</h3>

        <livewire:client.contact.create :client="$this->client"/>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->client->contacts as $contact)
                    <tr class="align-middle" wire:key="{{ $contact->id }}">
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone_number}}</td>
                        <td class="project-actions">
                            <a class="btn btn-outline-info btn-sm mb-2" href="{{ route('client.edit', ['client' => $client])}}" role="button">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr class="align-middle">
                        <div class="alert alert-warning">
                            <h5><i class="icon fas fa-warning"></i> No Contacts added!</h5>
                            click add to register.
                        </div>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

