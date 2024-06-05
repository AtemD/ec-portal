@extends('layouts.app')

@section('app-content-header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Platforms</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Platforms
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

                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#add-platform">
                            <i class="bi bi-plus xs"></i>
                            Add Platform
                        </button>

                        <div class="modal fade" id="add-platform" tabindex="-1" aria-labelledby="add-platform-label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="add-platform-label">Add New Platform</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form role="form" @submit.prevent="createCity">
                                        <div class="modal-body">

                                            <div class="mb-3"> 
                                                <label for="name" class="form-label">Name</label> 
                                                <input type="text" class="form-control" id="name" placeholder="platform name"required> 
                                            </div>

                                            <div class="mb-3"> 
                                                <label for="description" class="form-label">Description</label> 
                                                <textarea type="text" rows="3" name="description" placeholder="platform description" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Create Platform</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="add-platform" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add New City</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <form role="form" @submit.prevent="createCity">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input v-model="form.name" type="text" name="name" placeholder="name of city" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" required>
                                                <has-error :form="form" field="name"></has-error>
                                            </div>

                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea v-model="form.description" type="text" rows="3" name="description" placeholder="a short description of the city" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }" required></textarea>
                                                <has-error :form="form" field="description"></has-error>
                                            </div>

                                        </div>

                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button :disabled="form.busy" type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($platforms as $platform)
                            <tr class="align-middle">
                                <td>{{$platform->name}}</td>
                                <td>{{$platform->description}}</td>

                                <td class="project-actions">
                                    <a class="btn btn-outline-primary btn-sm mb-1" href="{{ route('platform.show', ['platform' => $platform]) }}" role="button">
                                        <i class="bi bi-eye">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-outline-info btn-sm mb-1" href="{{ route('platform.edit', ['platform' => $platform]) }}" role="button">
                                        <i class="bi bi-pencil-square">
                                        </i>
                                        Edit
                                    </a>
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
                    <ul class="pagination pagination-sm m-0 float-end">
                        {{$platforms->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection