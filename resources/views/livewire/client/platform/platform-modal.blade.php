<div wire:ignore.self class="modal fade" id="createPlatform" data-bs-backdrop="static" tabindex="-1" aria-labelledby="createPlatformLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createPlatformLabel">Create Platform</h1>
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
                            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name')}}" placeholder="Enter platform name">

                            @error('name')
                            <div class="invalid-feedback text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description')}}" placeholder="Enter platform description">

                            @error('name')
                            <div class="invalid-feedback text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button wire:click="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button wire:click="createPlatform" type="button" class="btn btn-primary">Create Platform</button>
                    </div>
                </form>
            </div>
        </div>
    </div>