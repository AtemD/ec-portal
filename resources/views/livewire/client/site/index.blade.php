<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($this->client->sites as $site)
            <tr class="align-middle">
                <td>{{$site->name}}</td>
                <td class="project-actions">
                    <a class="btn btn-outline-info btn-sm mb-2" href="{{ route('client.edit', ['client' => $client])}}" role="button">
                        Edit
                    </a>
                    <!--a class="btn btn-outline-danger btn-sm mb-2" href="{{ route('client.destroy', ['client' => $client])}}" role="button">
                        Delete
                    </!a-->
                    <button wire:click="deleteClientSite({{ $site->id }})" type="button" class="btn btn-outline-danger btn-sm mb-2">Delete</button>
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
