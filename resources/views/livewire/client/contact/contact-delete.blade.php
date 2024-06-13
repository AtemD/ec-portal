<div class="card-tools">
    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteContactModal">
        Delete
    </button>

    <div wire:ignore.self class="modal fade" id="deleteContactModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="deleteContactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteContactModalLabel">Delete Contact</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  wire:submit.prevent="save">
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Are your sure?!</h4>
                            <p>Your are about to delete the contact [{{$this->contact->name}}].</p>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button wire:click="deleteContact($this->contact->id)" type="button" class="btn btn-danger">Delete</button>
                        <button wire:click="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>