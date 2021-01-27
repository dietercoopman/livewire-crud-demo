<div class="container d-flex h-100">
    <div class="row align-self-center" style="width:100%">
        <table class="table table-striped">
            <tr>
                <td wire:click="sortBy('id')">ID</td>
                <td wire:click="sortBy('email')">E-mail</td>
                <td wire:click="sortBy('name')">Name</td>
                <td wire:click="sortBy('role_id')">Role</td>
                <td wire:click="sortBy('marbles')">marbles</td>
                <td></td>
            </tr>
            <tr>
                <td><input type="text" wire:model.debounce.200ms="search.id" placeholder="id" class="form-control">
                </td>
                <td><input type="text" wire:model.debounce.200ms="search.email" placeholder="email"
                           class="form-control"></td>
                <td><input type="text" wire:model.debounce.200ms="search.name" placeholder="name"
                           class="form-control"></td>
                <td><select wire:model="search.role_id" class="form-control">
                        <option value="">All</option>
                        @foreach($possibleRoles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td></td>
                <td class="float-right" nowrap>
                    <button class="btn btn-sm btn-info" wire:click="clearAll">clear search</button>
                    <button class="btn btn-sm btn-success" wire:click="edit(null)">+</button>
                </td>
            </tr>
            @foreach($users as $listuser)
                <tr>
                    <td>{{ $listuser->id}}</td>
                    <td>{{ $listuser->email}}</td>
                    <td>{{ $listuser->name}}</td>
                    <td>{{ optional($listuser->role)->name }}</td>
                    <td>{{ $listuser->marbles }}</td>
                    <td class="float-right">
                        <button class="btn btn-danger btn-sm" wire:click="$emit('askdelete',{{$listuser->id}})">Delete</button>
                        <button wire:click="edit({{ $listuser->id }})" class="btn btn-primary btn-sm">Edit</button>
                    </td>


                </tr>
            @endforeach
            <tr>
                <td colspan="2">
                    {{ $users->links() }}
                </td>
                <td colspan="4">
                    <select wire:model="paginationCount" class="form-control" class="col-4">
                        @foreach($possibleCounts as $number)
                            <option value="{{ $number }}">{{ $number }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            Total number of users : {{ $totalUsers }} , total number of marbles {{ $totalmarbles }} marbles
        </table>
    </div>

    @if($editUser)
        <livewire:edit-user :user="$user"/>
    @endif

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
