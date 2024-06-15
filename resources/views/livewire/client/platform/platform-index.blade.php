<div class="card h-100">
    <div class="card-header d-flex d-flex align-items-center">
        <h3 class="card-title me-auto">Platforms</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#editPlatformModal">
                <i class="bi bi-plus xs"></i>
                Add/Edit Platform
            </button>

            <div wire:ignore.self class="modal fade" id="editPlatformModal" data-bs-backdrop="static" tabindex="-1"
                aria-labelledby="editPlatformModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editPlatformModalLabel">Add Platform</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form wire:submit.prevent="storePlatform">
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
                                    @forelse($allPlatforms as $platform)
                                        <div class="form-check" wire:key="modal-{{ $platform['id'] }}">
                                            <input type="checkbox" wire:model="platforms" name="platforms[]"
                                                value="{{ $platform['id'] }}" class="form-check-input"
                                                id="add-platform-{{ $platform['id'] }}">
                                            <label class="form-check-label text-dark"
                                                for="add-platform-{{ $platform['id'] }}">
                                                {{ $platform['name'] }}
                                            </label>
                                        </div>
                                    @empty
                                        <div class="alert alert-warning" role="alert">
                                            No platforms to show, create one.
                                        </div>
                                    @endforelse


                                    @error('platforms')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    @foreach ($errors->get('platforms.*') as $message)
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message[0] }}</strong>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button wire:click="closeModal" type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">
                                    @if (count($platforms) < 1)
                                        Add Platform
                                    @else
                                        Update
                                        Platform
                                    @endif
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="mb-3">
            @if (count($platforms) > 0)
                @forelse($allPlatforms as $platform)
                    <div class="form-check" wire:key="show-{{ $platform['id'] }}">
                        <input type="checkbox" wire:model="platforms" name="platforms[]" value="{{ $platform['id'] }}"
                            class="form-check-input" id="show-platform-{{ $platform['id'] }}">
                        <label class="form-check-label text-dark" for="show-platform-{{ $platform['id'] }}">
                            {{ $platform['name'] }}
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
        {{ $this->client->name }} is on {{ $platformCount = count($platforms) }}
        {{ Str::plural('platform', $platformCount) }}.
    </div>
</div>
