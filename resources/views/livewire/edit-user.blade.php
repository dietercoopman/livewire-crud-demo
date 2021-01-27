<div>
    <div class="modal d-block" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="upateModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manage user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" wire:click="$emitUp('closeEdit')">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($showMessage)
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            Save successfully !
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name" class="col-lg-2 col-md-2 control-label">Name</label>
                        <div class="col-lg-10 col-md-7">
                            <input type="text" wire:model.defer="user.name" name="name" class='form-control'>
                            @error('user.name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-lg-2 col-md-2 control-label">E-mail</label>
                        <div class="col-lg-10 col-md-7">
                            <input type="text" wire:model.defer="user.email" name="email" class='form-control'>
                            @error('user.email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-lg-2 col-md-2 control-label">Role</label>
                        <div class="col-lg-10 col-md-7">
                            <select wire:model="user.role_id" class="form-control">
                                <option value="">All</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('user.role_id') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="marbles" class="col-lg-2 col-md-2 control-label">marbles</label>
                        <div class="col-lg-10 col-md-7">
                            <input type="number" wire:model.defer="user.marbles" name="marbles" class='form-control'>
                            @error('user.marbles') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" wire:click="$emitUp('closeEdit')">Close</button>
                    <button type="button" class="btn btn-sm btn-primary" wire:click="save()">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        this.livewire.on('askdelete', id => {
            bootbox.confirm("Zeker ?", (result) => {
                if (result) {
                    this.livewire.emit('delete', id)
                }
            });
        });
    });
</script>
<style>
    .error{
        color:red;
    }
</style>
