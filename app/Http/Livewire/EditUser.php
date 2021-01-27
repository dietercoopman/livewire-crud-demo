<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public $user;
    public $showMessage = false;

    protected $rules = [
        'user.name'    => 'required|string|min:6',
        'user.email'   => 'required|email',
        'user.role_id' => 'required',
        'user.marbles'  => 'required',
    ];

    public function render()
    {
        $roles = Role::all();
        return view('livewire.edit-user', compact('roles'));
    }

    public function delete($id)
    {
        User::destroy([$id]);
        $this->emitUp('closeEdit');
    }


    public function save()
    {
        $this->validate();
        if (is_object($this->user)) {
            $this->user->save();
        } else {
            $this->user['password'] = Hash('sha256', $this->generateRandomString());
            $this->user             = User::create($this->user);
        }
        $this->showMessage = true;
    }

    private function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }


}
