<div class="card h-100">
    <div class="card-header d-flex d-flex align-items-center">
        <h3 class="card-title me-auto">Sites</h3>

        <div class="card-tools">
            <button wire:click="createSite" type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#createSite">
                <i class="bi bi-plus xs"></i>
                Add Site
            </button>

            <div wire:ignore.self class="modal fade" id="createSite" data-bs-backdrop="static" tabindex="-1"
                aria-labelledby="createSiteLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createSiteLabel">Add Site</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form wire:submit.prevent="storeSite">
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
                                        name="name" value="{{ old('name') }}" placeholder="Enter site name">

                                    @error('name')
                                        <div class="invalid-feedback text-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button wire:click="closeModal" type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add
                                    Site</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div wire:ignore.self class="modal fade" id="editSiteModal" data-bs-backdrop="static" tabindex="-1"
                aria-labelledby="editSiteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editSiteModalLabel">Edit Site</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form wire:submit.prevent="updateSite">
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
                                        name="name" value="{{ old('name') }}" placeholder="Enter site name">

                                    @error('name')
                                        <div class="invalid-feedback text-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button wire:click="closeModal" type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update
                                    Site</button>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (session('success'))
                        <tr class="align-middle">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </tr>
                    @endif

                    @if (session('error'))
                        <tr class="align-middle">
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        </tr>
                    @endif

                    @forelse ($sites as $site)
                        <tr class="align-middle" wire:key="{{ $site->id }}">
                            <td>{{ $site->name }}</td>
                            <td class="project-actions">
                                <button wire:click="editSite({{ $site }})"
                                    class="btn btn-outline-info btn-sm mx-1 me-auto" data-bs-toggle="modal"
                                    data-bs-target="#editSiteModal">
                                    Edit
                                </button>
                                <button type="button" wire:confirm="Are you sure you want to delete this site?"
                                    wire:click="deleteSite({{ $site }})"
                                    class="btn btn-sm btn-outline-danger">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr class="align-middle">
                            <div class="alert alert-warning">
                                <h5><i class="icon fas fa-warning"></i> No sites added!</h5>
                                click add to register
                            </div>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer clearfix">
        {{ $sites->links(data: ['scrollTo' => false]) }}
    </div>
</div>
