<div class="card mb-4">
    <div class="card-header">
        <div class="card-tools float-start">
            <div class="input-group">
                <input type="search" class="form-control" placeholder="search" id="example-search-input">
                <span class="input-group-text bg-white" id="basic-addon2"><i class="bi bi-search"></i></span>
            </div>
        </div>

        <div class="card-tools">

            <button wire:click="openModal" type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#createPlatformModal">
                <i class="bi bi-plus xs"></i>
                Add Platform
            </button>

            <div wire:ignore.self class="modal" id="createPlatformModal" data-bs-backdrop="static" tabindex="-1"
                aria-labelledby="createPlatformModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createPlatformModalLabel">Create Platform</h1>
                            <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form role="form" wire:submit.prevent="createPlatform">
                            <div class="modal-body">
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
                                    <input wire:model="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name') }}" placeholder="Enter platform name">

                                    @error('name')
                                        <div class="invalid-feedback text-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea wire:model="description" type="text" rows="3" name="description"
                                        placeholder="Enter a short description of the platform"
                                        class="form-control  @error('description') is-invalid @enderror">{{ old('description') }}</textarea>


                                    @error('description')
                                        <div class="invalid-feedback text-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer justify-content-between">
                                <button wire:click="closeModal" type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div wire:ignore.self class="modal" id="editPlatformModal" data-bs-backdrop="static" tabindex="-1"
                aria-labelledby="editPlatformModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editPlatformModalLabel">Edit Platform</h1>
                            <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form role="form" wire:submit.prevent="updatePlatform">
                            <div class="modal-body">
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
                                    <input wire:model="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name') }}" placeholder="Enter platform name">

                                    @error('name')
                                        <div class="invalid-feedback text-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea wire:model="description" type="text" rows="3" name="description"
                                        placeholder="Enter a short description of the platform"
                                        class="form-control  @error('description') is-invalid @enderror">{{ old('description') }}</textarea>


                                    @error('description')
                                        <div class="invalid-feedback text-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer justify-content-between">
                                <button wire:click="closeModal" type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card-body p-0 table-responsive">

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

        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>NAME</th>
                    <th>DESCRIPTION</th>
                    <th style="width: 120px">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse($platforms as $platform)
                    <tr class="align-middle" wire:key="{{ $platform->id }}">
                        <td>{{ $platform->name }}</td>
                        <td>{{ $platform->description }}</td>

                        <td class="project-actions">
                            <button wire:click="editPlatform({{ $platform }})" type ="button"
                                class="btn btn-outline-info btn-sm mb-1" data-bs-toggle="modal"
                                data-bs-target="#editPlatformModal">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </button>

                            <button type ="button" class="btn btn-outline-danger btn-sm mb-1"
                                wire:confirm="Are you sure you want to delete this platform?"
                                wire:click="deletePlatform({{ $platform->id }})">
                                <i class="bi bi-x-lg"></i>
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <div class="alert alert-warning">
                            <h5><i class="icon fas fa-warning"></i> No Platforms Registered Yet!</h5>
                            click add to register at a platform.
                        </div>
                    </tr>
                @endempty
        </tbody>
    </table>
</div>
<div class="card-footer clearfix">
    {{ $platforms->links() }}
</div>
</div>
