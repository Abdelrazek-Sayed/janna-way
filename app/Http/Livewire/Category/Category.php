<?php

namespace App\Http\Livewire\Category;

use App\Models\Category as ModelsCategory;
use App\Models\Role;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $deleteModal = false;
    public $edit_page = false;

    public $name;
    public $category;

    public function create()
    {
        $data = $this->validate([
            'name'  => 'required|min:3',
        ]);
        ModelsCategory::create([
            'name' => $data['name'],
        ]);

        $this->formReset();
        session()->flash('success', 'category created');
    }

    public function edit($id)
    {
        $this->edit_page =  true;
        $category =    ModelsCategory::findOrFail($id);
        $this->name = $category->name;
        $this->category = $category;
    }

    public function update()
    {
        $data = $this->validate([
            'name'  => 'required|min:3',
        ]);

        $this->category->update([
            'name' => $data['name'],
        ]);
        $this->edit_page = false;
        session()->flash('success', 'category updated');
        $this->formReset();
    }
    public function delete($id)
    {
        ModelsCategory::findOrFail($id)->delete();
        session()->flash('success', 'category deleted');
    }

    public function formReset()
    {
        $this->resetValidation();
        $this->name = "";
    }


    public function render()
    {
        $categories = ModelsCategory::latest()->paginate(10);
        return view('livewire.Category.Category', [
            'categories' => $categories,
        ])->extends('layouts.dashboard.dashboard')->section('content');
    }
}
