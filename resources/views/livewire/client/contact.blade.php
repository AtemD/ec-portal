<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">Contacts</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus xs"></i>
                Add Contact
            </button>

            <div wire:ignore.self class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Contact</h1>
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
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name')}}" placeholder="Enter client name">

                                    @error('name')
                                    <div class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Client Name</label>
                                    <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email')}}" placeholder="Enter contact email">

                                    @error('email')
                                    <div class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="text" wire:model="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number')}}" placeholder="Enter phone number">

                                    @error('phone_number')
                                    <div class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button wire:click="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button wire:click="createClientContact" type="button" class="btn btn-primary">Add Contact</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

