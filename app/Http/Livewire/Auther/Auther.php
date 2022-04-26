<?php

namespace App\Http\Livewire\Auther;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use App\Models\Auther as ModelsAuther;
use Illuminate\Support\Facades\Storage;

class Auther extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $deleteModal = false;
    public $edit_page = false;

    public $name;
    public $image;
    public $description;
    public $auther;

    public function create()
    {
        $data = $this->validate([
            'name'  => 'required|min:3',
            'image'  => 'nullable|image|mimes:png,jpg',
            'description'  => 'nullable',
        ]);


        if (!empty($data['image'])) {
            $img = Image::make($data['image']);
            $img->resize(300, NULL, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/images/authers/' . $data['image']->hashName()));
            $data['image'] = $data['image']->hashName();
        } else {
            $data['image'] = 'default_auther.png';
        }
        ModelsAuther::create([
            'name' => $data['name'],
            'image' => $data['image'],
            'description' => $data['description'],
        ]);

        $this->formReset();
        session()->flash('success', 'auther created');
    }

    public function edit($id)
    {
        $this->edit_page =  true;
        $auther =    ModelsAuther::findOrFail($id);
        $this->name = $auther->name;
        $this->description = $auther->description;
        $this->auther = $auther;
    }

    public function update()
    {
        $data = $this->validate([
            'name'  => 'required|min:3',
            'image'  => 'nullable|image|mimes:png,jpg',
            'description'  => 'nullable',
        ]);

        if (!empty($data['image'])) {
            if ($this->auther->image != 'default_auther.png') {
                Storage::disk('uploads')->delete('images/authers/' . $this->auther->image);
            }
            $img = Image::make($data['image']);
            $img->resize(300, NULL, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/images/authers/' . $data['image']->hashName()));
            $data['image'] = $data['image']->hashName();
        } else {
            $data['image'] =  $this->auther->image;
        }

        $this->auther->update([
            'name' => $data['name'],
            'image' => $data['image'],
            'description' => $data['description'],
        ]);
        $this->edit_page = false;
        session()->flash('success', 'auther updated');
        $this->formReset();
    }
    public function delete($id)
    {
        $auther =    ModelsAuther::findOrFail($id);
        if ($auther->image != 'default_auther.png') {
            Storage::disk('uploads')->delete('images/authers/' . $auther->image);
        }

        $auther->delete();
        session()->flash('success', 'auther deleted');
    }

    public function formReset()
    {
        $this->resetValidation();
        $this->reset('name');
        $this->reset('image');
        $this->reset('description');
    }


    public function render()
    {
        return view('livewire.Auther.Auther', [
            'authers' => ModelsAuther::latest()->paginate(4),
        ])->extends('layouts.dashboard.dashboard')->section('content');
    }
}
