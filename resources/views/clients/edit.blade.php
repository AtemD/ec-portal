@extends('layouts.app')

@section('app-content-header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">{{ $client->name }}</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('client.index')}}">Clients</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{$client->name}}
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Edit
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="email" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$client->name}}" aria-describedby="client_name">

                        @error('name')
                        <div id="client_name" class="form-text text-danger">
                            We'll never share your email with anyone else.
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="contract_status" class="form-label">Contract Status</label>
                        <select class="form-select @error('contract_status') is-invalid @enderror" id="contract_status" name="contract_status">
                            <option value="">Select Contract Status</option>
                            @forelse($contract_statuses as $contract_status)
                            <option value="{{$contract_status->id}}" {{ old('contract_status') == $client->contract_status_id || $contract_status->id == $client->contract_status_id ? 'selected' : '' }}>{{$contract_status->name}}</option>
                            @empty
                            <option value="">Error...</option>
                            @endforelse
                        </select>

                        @error('contract_status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-warning">Sign in</button>  -->
                    <button type="submit" class="btn btn-secondary float-end">Update Profile</button>
                </div>

            </div> <!-- /.card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Platforms</h3>
                </div> <!-- /.card-header -->
                <div class="card-body">
                    <div class="mb-3">
                        <!-- <label for="platforms" class="form-label">Select or Add Platforms</label> -->
                        @forelse($platforms as $platform)
                        <div class="form-check">
                            <input type="checkbox" name="platforms[]" value="{{$platform->id}}" class="form-check-input" id="add-platform-{{$platform->id}}" {{$client->platforms->contains('name', $platform->name) ? "checked" : ""}}>
                            <label class="form-check-label" for="add-platform-{{$platform->id}}">
                                {{$platform->name}}
                            </label>
                        </div>
                        @empty
                        <div class="alert alert-warning" role="alert">
                            No platforms to show, create one.
                        </div>
                        @endforelse

                        @error('platform')
                        <span class="text-danger" role="alert">
                            <strong>*{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-secondary float-end">Update Platforms</button>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Contacts</h3>

                    <livewire:create-client-contact :client="$client"/>
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
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Sites</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-outline-primary">
                            <i class="bi bi-plus xs"></i>
                            Add Site
                        </button>
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
                                    <td>{{$site->name}}</td>
                                    <td class="project-actions">
                                        <a class="btn btn-outline-info btn-sm mb-2" href="{{ route('client.edit', ['client' => $client])}}" role="button">
                                            Edit
                                        </a>
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
            </div>
        </div>
    </div>
</div>
@endsection