@extends('layouts.app')

@section('app-content-header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Clients</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Clients
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-tools float-start">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="search" id="example-search-input">
                            <span class="input-group-text bg-white" id="basic-addon2"><i class="bi bi-search"></i></span>
                        </div>
                    </div>

                    <div class="card-tools">
                        <button type="button" class="btn btn-primary">
                            <i class="bi bi-plus xs"></i>
                            Add Client
                        </button>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Contract Status</th>
                                <th>Contacts</th>
                                <th>Platforms</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clients as $client)
                            <tr class="align-middle">
                                <td>{{$client->name}}</td>

                                <td>
                                    <span class="badge text-bg-{{$client->contractStatus->color}}">{{$client->contractStatus->name}}</span>
                                </td>

                                <td>
                                    @forelse($client->contacts as $contact)

                                    {{$contact->name}}
                                    {{ $loop->last ? '...' : ', ' }}
                                    @empty
                                    <div class="alert alert-warning">
                                        <h5><i class="icon fas fa-warning"></i> No Contacts added for this client!</h5>
                                        click add to register a contact for this client.
                                    </div>
                                    @endempty
                                </td>

                                <td>
                                    @forelse($client->platforms as $platform)
                                    <span class="badge text-bg-light">{{$platform->name}}</span>
                                    @empty
                                    <div class="alert alert-warning">
                                        <h5><i class="icon fas fa-warning"></i> No Platforms added for this client!</h5>
                                        click add to add a platform for this client.
                                    </div>
                                    @endempty
                                </td>

                                <td class="project-actions">
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('clients.show', ['client' => $client])}}" role="button">
                                        <i class="bi bi-eye">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('clients.edit', ['client' => $client])}}" role="button">
                                        <i class="bi bi-pencil-square">
                                        </i>
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <div class="alert alert-warning">
                                    <h5><i class="icon fas fa-warning"></i> No Clients Registered Yet!</h5>
                                    click add to register at a client.
                                </div>
                            </tr>
                            @endempty

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection