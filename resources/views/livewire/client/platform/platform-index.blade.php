<div class="card h-100">
    <div class="card-header d-flex d-flex align-items-center">
        <h3 class="card-title me-auto">Platforms</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#clientSiteCreate">
                <i class="bi bi-plus xs"></i>
                Add Platform
            </button>

            <div wire:ignore.self class="modal fade" id="clientSiteCreate" data-bs-backdrop="static" tabindex="-1"
                aria-labelledby="clientSiteCreateLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="clientSiteCreateLabel">Add Site</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form wire:submit.prevent="save">
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
                                        name="name" value="{{ old('name') }}" placeholder="Enter client name">

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
                                <button wire:click="createClientSite" type="button" class="btn btn-primary">Add
                                    Site</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="mb-3">
            @if ($client->platforms->count() > 0)
                @forelse($platforms as $platform)
                    <div class="form-check" wire:key="{{ $platform->id }}">
                        <input type="checkbox" name="platforms[]" value="{{ $platform->id }}" class="form-check-input"
                            id="add-platform-{{ $platform->id }}"
                            {{ $client->platforms->contains('name', $platform->name) ? 'checked' : '' }} disabled>
                        <label class="form-check-label text-dark" for="add-platform-{{ $platform->id }}">
                            {{ $platform->name }}
                        </label>
                    </div>
                @empty
                    <div class="alert alert-warning" role="alert">
                        No platforms to show, create one.
                    </div>
                @endforelse
            @else
                <div class="alert alert-warning">
                    <h5><i class="icon fas fa-warning"></i> No Plaforms added!</h5>
                    click edit to add plaforms.
                </div>
            @endif

            @error('platform')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
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
