<?php

namespace App\Livewire\CategoryResources;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class CategoryEdit extends Component
{
    public $modalName = '';

    public Category $category;

    public $name = '';

    #[On('category-edit-id')]
    public function setProductId(Category $data)
    {
        $this->category = $data;
        $this->name = $data->name;
    }

    public function save()
    {
        // update category data
        $this->category->name = $this->name;

        $this->category->save(); // save product data

        $this->dispatch($this->modalName, 'close'); // close modal
        $this->resetInput(); // reset input modal
        $this->dispatch('refreshDatatable'); // refresh table
    }

    #[On('reset-modal')]
    public function resetInput() {
        $this->resetExcept(['modalName']);
    }

    public function render()
    {
        return view('pages.admin.category.livewire.edit-form');
    }
}
