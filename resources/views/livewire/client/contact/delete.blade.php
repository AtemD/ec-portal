<div class="card-tools">
    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteContactModal">
        <i class="bi bi-plus xs"></i>
        Delete
    </button>

    <div wire:ignore.self class="modal fade" id="deleteContactModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="deleteContactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteContactModalLabel">Add Contact</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  wire:submit.prevent="save">
                    <div class="modal-body">
                    

                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button wire:click="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button wire:click="deleteClientContact" type="button" class="btn btn-primary">Yes Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>