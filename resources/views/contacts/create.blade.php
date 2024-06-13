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
                <li class="breadcrumb-item"><a href="{{route('client.show', ['client' => $client->slug])}}">{{$client->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contacts</li>
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
                    <h3 class="card-title">Contacts</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-outline-primary">
                            <i class="bi bi-plus xs"></i>
                            Add Contact
                        </button>
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
                                    <td>
                                        <div class="alert alert-warning">
                                            <h5><i class="icon fas fa-warning"></i> No Contacts added!</h5>
                                            click add to register.
                                        </div>
                                    </td>
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