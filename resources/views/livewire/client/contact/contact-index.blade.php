<div>
    <livewire:client.contact.contact-delete>

    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Contacts</h3>
            <livewire:client.contact.contact-create :client="$this->client"/>
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
                        <tr class="align-middle">
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->phone_number}}</td>
                            <td class="project-actions">
                                <a class="btn btn-outline-info btn-sm mb-2" role="button">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteClientContactModal">
                                    Delete
                                </button>
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
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item"> <a class="page-link" href="#">«</a> </li>
                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                <li class="page-item"> <a class="page-link" href="#">»</a> </li>
            </ul>
        </div>
    </div>
</div>
