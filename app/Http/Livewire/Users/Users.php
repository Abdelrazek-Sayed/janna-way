<?php

namespace App\Http\Livewire\Users;

use App\Models\Role;
use Livewire\Component;
use App\Models\Permission;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $deleteModal = false;
    public $edit_page = false;
    public $user;
    public $name;
    public $email;
    public $role_id;
    public $password;
    public function create()
    {
        $data = $this->validate([
            'email' => 'required|unique:users,email',
            'name'  => 'required|min:1',
            'password'  => 'required|min:6',
            'role_id'  => 'required|exists:roles,id',
        ]);
        // dd($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $role = Role::findOrFail($data['role_id']);
        $user->attachRole($role);

        $this->formReset();
        session()->flash('success', 'User created');
    }

    public function edit($id)
    {
        $this->edit_page =  true;
        $user =    User::findOrFail($id);
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update()
    {
        $data = $this->validate([
            'email' => 'required|unique:users,email,' . $this->user->id,
            'name'  => 'required|min:1',
            'password'  => 'required|min:6',
            'role_id'  => 'required|exists:roles,id',
        ]);

        $this->user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $role = Role::findOrFail($data['role_id']);
        $this->user->attachRole($role);
        $this->edit_page = false;
        session()->flash('success', 'user updated');
        $this->formReset();
    }
    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('success', 'User deleted');
    }

    public function formReset()
    {
        $this->resetValidation();
        $this->email = "";
        $this->name = "";
        $this->password = "";
        $this->role_id = "";
    }


    public function render()
    {
        $users = User::latest()->paginate(10);
        $roles = Role::all();
        return view('livewire.users.users', [
            'users' => $users,
            'roles' => $roles,
        ])->extends('layouts.dashboard.dashboard')->section('content');
    }
}
