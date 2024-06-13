@extends('layouts.app')

@section('app-content-header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">{{ $client->name }}</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Clients</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $client->name }}
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Show
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <livewire:client.client-profile :client="$client" :contractStatuses="$contractStatuses" />
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header d-flex d-flex align-items-center">
                        <h3 class="card-title me-auto">Contacts</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bi bi-plus xs"></i>
                                Add Contact
                            </button>

                            <div wire:ignore.self class="modal fade" id="exampleModal" data-bs-backdrop="static"
                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Contact</h1>
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
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" name="name" value="{{ old('name') }}"
                                                        placeholder="Enter client name">

                                                    @error('name')
                                                        <div class="invalid-feedback text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Client Name</label>
                                                    <input type="email" wire:model="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="email" name="email" value="{{ old('email') }}"
                                                        placeholder="Enter contact email">

                                                    @error('email')
                                                        <div class="invalid-feedback text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="phone_number" class="form-label">Phone Number</label>
                                                    <input type="text" wire:model="phone_number"
                                                        class="form-control @error('phone_number') is-invalid @enderror"
                                                        id="phone_number" name="phone_number"
                                                        value="{{ old('phone_number') }}" placeholder="Enter phone number">

                                                    @error('phone_number')
                                                        <div class="invalid-feedback text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="modal-footer d-flex justify-content-between">
                                                <button wire:click="closeModal" type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button wire:click="createClientContact" type="button"
                                                    class="btn btn-primary">Add Contact</button>
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
                                    @forelse ($client->contacts as $contact)
                                        <tr class="align-middle">
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone_number }}</td>
                                            <td class="project-actions">
                                                <a class="btn btn-outline-info btn-sm mb-2" role="button">
                                                    Edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteClientContactModal">
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
            <div class="col">
                <div class="card h-100">
                    <div class="card-header  d-flex d-flex align-items-center">
                        <h3 class="card-title me-auto">Platforms</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#clientSiteCreate">
                                <i class="bi bi-plus xs"></i>
                                Add Platform
                            </button>

                            <div wire:ignore.self class="modal fade" id="clientSiteCreate" data-bs-backdrop="static"
                                tabindex="-1" aria-labelledby="clientSiteCreateLabel" aria-hidden="true">
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
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" name="name" value="{{ old('name') }}"
                                                        placeholder="Enter client name">

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
                                                <button wire:click="createClientSite" type="button"
                                                    class="btn btn-primary">Add Site</button>
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
                                    <div class="form-check">
                                        <input type="checkbox" name="platforms[]" value="{{ $platform->id }}"
                                            class="form-check-input" id="add-platform-{{ $platform->id }}"
                                            {{ $client->platforms->contains('name', $platform->name) ? 'checked' : '' }}
                                            disabled>
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
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header d-flex d-flex align-items-center">
                        <h3 class="card-title me-auto">Sites</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#clientSiteCreate">
                                <i class="bi bi-plus xs"></i>
                                Add Site
                            </button>

                            <div wire:ignore.self class="modal fade" id="clientSiteCreate" data-bs-backdrop="static"
                                tabindex="-1" aria-labelledby="clientSiteCreateLabel" aria-hidden="true">
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
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" name="name" value="{{ old('name') }}"
                                                        placeholder="Enter client name">

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
                                                <button wire:click="createClientSite" type="button"
                                                    class="btn btn-primary">Add Site</button>
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
                                    @forelse ($client->sites as $site)
                                        <tr class="align-middle">
                                            <td>{{ $site->name }}</td>
                                            <td class="project-actions">
                                                <a class="btn btn-outline-info btn-sm mb-2"
                                                    href="{{ route('client.edit', ['client' => $client]) }}"
                                                    role="button">
                                                    Edit
                                                </a>
                                                <!--a class="btn btn-outline-danger btn-sm mb-2" href="{{ route('client.destroy', ['client' => $client]) }}" role="button">
                                                                                                                                                                                                                Delete
                                                                                                                                                                                                            </!a-->
                                                <button wire:click="deleteClientSite({{ $site->id }})" type="button"
                                                    class="btn btn-outline-danger btn-sm mb-2">Delete</button>
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
        </div>
    </div>
@endsection
