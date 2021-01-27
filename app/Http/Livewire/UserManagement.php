<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    protected $listeners = ['closeEdit', 'delete', 'edit'];
    protected $paginationTheme = 'bootstrap';

    public $search = ['name' => '', 'email' => '', 'id' => '', 'role_id' => ''];
    public $paginationCount = 10;
    public $sortField = "name";
    public $sortOrder = "asc";
    public $editUser = false;
    public $user = null;

    public function render()
    {
        $users = User::query();
        $users = $this->applySearch($users);
        $users->orderBy($this->sortField, $this->sortOrder);
        $totalmarbles = $users->sum('marbles');
        $totalUsers  = $users->count();

        return view('livewire.user-management',
            [
                'user'           => $this->user,
                'users'          => $users->paginate($this->paginationCount),
                'totalmarbles'   => $totalmarbles,
                'totalUsers'    => $totalUsers,
                'possibleCounts' => [1, 5, 10, 15, 20],
                'possibleRoles'  => Role::all()
            ]
        );
    }

    public function sortBy($field)
    {
        $this->sortField = $field;
        $this->sortOrder = ($this->sortOrder == "asc") ? "desc" : "asc";
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPaginationCount()
    {
        $this->resetPage();
    }

    public function clearAll()
    {
        $this->search = ['name' => '', 'email' => '', 'id' => '', 'role_id' => ''];
        $this->resetPage();
    }

    /** EDIT */

    public function edit($user)
    {
        $this->user     = User::find($user);
        $this->editUser = true;
    }

    public function closeEdit()
    {
        $this->user     = null;
        $this->editUser = false;
    }

    /** DELETE */

    public function delete($id)
    {
        User::destroy([$id]);
    }

    private function applySearch(\Illuminate\Database\Eloquent\Builder $users)
    {
        $users = ($this->search['name']) ? $users->where('name', 'like', '%' . $this->search['name'] . '%') : $users;
        $users = ($this->search['email']) ? $users->where('email', 'like', '%' . $this->search['email'] . '%') : $users;
        $users = ($this->search['id']) ? $users->where('id', '=', $this->search['id']) : $users;
        $users = ($this->search['role_id']) ? $users->where('role_id', '=', $this->search['role_id']) : $users;
        return $users;
    }

}
