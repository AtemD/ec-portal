<div class="card mb-4">
    <div class="card-header">
        <div class="card-tools float-start">
            <div class="input-group">
                <input type="search" class="form-control" placeholder="search" id="example-search-input">
                <span class="input-group-text bg-white" id="basic-addon2"><i class="bi bi-search"></i></span>
            </div>
        </div>

        <div class="card-tools">

            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#add-platform">
                <i class="bi bi-plus xs"></i>
                Add Platform
            </button>

            @include('livewire.client.platform.platform-modal')

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
                                    <input v-model="form.name" type="text" name="name" placeholder="name of city"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }"
                                        required>
                                    <has-error :form="form" field="name"></has-error>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea v-model="form.description" type="text" rows="3" name="description"
                                        placeholder="a short description of the city" class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('description') }" required></textarea>
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
                    <th style="width: 120px">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse($platforms as $platform)
                    <tr class="align-middle">
                        <td>{{ $platform->name }}</td>
                        <td>{{ $platform->description }}</td>

                        <td class="project-actions">
                            <button type ="button" class="btn btn-outline-info btn-sm mb-1" data-bs-toggle="modal"
                                data-bs-target="#createPlatformModal">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </button>
                            <button type ="button" class="btn btn-outline-danger btn-sm mb-1"
                                wire:confirm="Are you sure you want to delete this platform?"
                                wire:click="deletePlatform">
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
    <ul class="pagination pagination-sm m-0 float-end">
        {{ $platforms->links() }}
    </ul>
</div>
</div>
