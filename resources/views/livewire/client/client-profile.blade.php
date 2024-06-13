<div class="card h-100">
    <div class="card-header d-flex d-flex align-items-center">
        <h3 class="card-title me-auto">Profile</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                data-bs-target="#editClientProfileModal">
                <i class="bi bi-plus xs"></i>
                Edit Profile
            </button>

            <div wire:ignore.self class="modal fade" id="editClientProfileModal" data-bs-backdrop="static" tabindex="-1"
                aria-labelledby="editClientProfileModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editClientProfileModalLabel">Edit Profile</h1>
                            <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form wire:submit.prevent="updateClientProfile">
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
                                    <input type="text" wire:model="name"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name') ? old('name') : $this->client->name }}"
                                        placeholder="Enter client name">

                                    @error('name')
                                        <div class="invalid-feedback text-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contract_status" class="form-label">Contract Status</label>
                                    <select wire:model="contract_status"
                                        class="form-select @error('contract_status') is-invalid @enderror"
                                        id="contract_status" name="contract_status">
                                        <option value="">Select...</option>
                                        @forelse($contractStatuses as $contract_status)
                                            <option value="{{ $contract_status->id }}"
                                                {{ old('contract_status') == $client->contract_status_id || $contract_status->id == $client->contract_status_id ? 'selected' : '' }}>
                                                {{ $contract_status->name }}</option>
                                        @empty
                                            <option value="">No Contract Statuses.</option>
                                        @endforelse
                                    </select>

                                    @error('contract_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button wire:click="closeModal" type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update
                                    Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="email" class="form-control" id="name" value="{{ $client->name }}"
                aria-describedby="nameHelp" disabled>
            <div id="nameHelp" class="form-text">To update name field, click the edit button above.</div>
        </div>
        <div class="mb-3">
            <label for="contract_status" class="form-label">Contract Status</label>
            <span class="badge text-bg-{{ $client->contractStatus->color }}">{{ $client->contractStatus->name }}</span>

            <select class="form-select" id="contract_status" name="contract_status"
                aria-describedby="contractStatusHelp" disabled>
                <option value="">Select Contract Status</option>
                @forelse($contractStatuses as $contract_status)
                    <option value="{{ $contract_status->id }}"
                        {{ old('contract_status') == $client->contract_status_id || $contract_status->id == $client->contract_status_id ? 'selected' : '' }}>
                        {{ $contract_status->name }}
                    </option>
                @empty
                    <option value="">No Contract Statuses.</option>
                @endforelse
            </select>
            <div id="contractStatusHelp" class="form-text">To update contract status field, click the edit button above.
            </div>
        </div>
    </div>
    <div class="card-footer">
        <small class="text-body-secondary">Last updated {{ $client->updated_at->diffForHumans() }}</small>
    </div>
</div>
