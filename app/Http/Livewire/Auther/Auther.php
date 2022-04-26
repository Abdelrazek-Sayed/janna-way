<?php

namespace App\Http\Livewire\Auther;

use App\Models\Auther as ModelsAuther;
use Livewire\Component;
use Livewire\WithPagination;

class Auther extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $deleteModal = false;
    public $edit_page = false;

    public $name;
    public $image;
    public $auther;

    public function create()
    {
        $data = $this->validate([
            'name'  => 'required|min:3',
            'image'  => 'nullable|image|mimes:png,jpg',
        ]);
        ModelsAuther::create([
            'name' => $data['name'],
        ]);

        $this->formReset();
        session()->flash('success', 'auther created');
    }

    public function edit($id)
    {
        $this->edit_page =  true;
        $auther =    ModelsAuther::findOrFail($id);
        $this->name = $auther->name;
        $this->auther = $auther;
    }

    public function update()
    {
        $data = $this->validate([
            'name'  => 'required|min:3',
        ]);

        $this->auther->update([
            'name' => $data['name'],
        ]);
        $this->edit_page = false;
        session()->flash('success', 'auther updated');
        $this->formReset();
    }
    public function delete($id)
    {
        ModelsAuther::findOrFail($id)->delete();
        session()->flash('success', 'auther deleted');
    }

    public function formReset()
    {
        $this->resetValidation();
        $this->name = "";
        $this->image = "";
    }


    public function render()
    {
        return view('livewire.Auther.Auther', [
            'authers' => ModelsAuther::latest()->paginate(10),
        ])->extends('layouts.dashboard.dashboard')->section('content');
    }
}
