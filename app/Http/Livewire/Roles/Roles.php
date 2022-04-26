<?php

namespace App\Http\Livewire\Roles;

use App\Models\Role;
use Livewire\Component;
use App\Models\Permission;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Roles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $selectAll = false;
    public $deleteModal = false;
    public $edit_page = false;
    public $role_name;
    public $role;
    public $role_id;
    public $permissions = [];


    public $models;
    public  $cruds = ['create', 'read', 'update', 'delete'];

    public function mount()
    {
        $this->models = $this->getModelNames();
    }
    public function getModelNames(): array
    {
        $path = app_path('Models') . '/*.php';
        return collect(glob($path))
            ->map(fn ($file) => basename($file, '.php'))
            ->toArray();
    }
    public function back()
    {
        $this->edit_page = false;
        $this->permissions = [];
    }
    public function create()
    {
        $data = $this->validate([
            'role_name' => 'required|unique:roles,name',
            'permissions'  => 'required|array|min:1',
        ]);

        $role = Role::create([
            'name' => $data['role_name'],
            'display_name' => $data['role_name'],
            'description' => 'new role',
        ]);

        foreach ($data['permissions'] as $permission) {
            $permissions_ids[] = Permission::firstOrCreate([
                'name' => $permission,
                'display_name' => $permission,
                'description' => $permission,
            ])->id;
        }
        $role->permissions()->sync($permissions_ids);

        session()->flash('success', 'role created');
        $this->formReset();
    }

    public function edit($id)
    {
        $this->edit_page =  true;
        $role =    Role::findOrFail($id);

        $this->role = $role;
        $this->role_name = $role->name;
        $this->role_id = $role->id;
        foreach ($role->permissions as $permission) {
            $this->permissions[] = $permission->name;
        }
    }

    public function update()
    {
        $data = $this->validate([
            'role_name' => 'required|unique:roles,name,' . $this->role_id,
            'permissions'  => 'required|array|min:1',
        ]);

        $this->role->update([
            'name' => $data['role_name'],
            'display_name' => $data['role_name'],
            'description' => 'new role',
        ]);

        foreach ($data['permissions'] as $permission) {
            $permissions_ids[] = Permission::firstOrCreate([
                'name' => $permission,
                'display_name' => $permission,
                'description' => $permission,
            ])->id;
        }
        $this->role->permissions()->sync($permissions_ids);
        $this->edit_page = false;
        session()->flash('success', 'role updated');
        $this->formReset();
    }
    public function delete($id)
    {
        Role::findOrFail($id)->delete();
        session()->flash('success', 'role deleted');
    }

    public function formReset()
    {
        $this->resetValidation();
        $this->role_name = "";
        $this->permissions = [];
    }

    public function selectAllStatus()
    {
        $this->selectAll = true;
    }
    public function render()
    {
        $roles = Role::latest()->paginate(10);
        return view('livewire.roles.roles', [
            'roles' => $roles
        ])->extends('layouts.dashboard.dashboard')->section('content');
    }
}
