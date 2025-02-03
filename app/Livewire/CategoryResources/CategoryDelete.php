<?php

namespace App\Livewire\CategoryResources;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class CategoryDelete extends Component
{
    public $modalName = '';
    public Category $category;
    public $categoryName = '';

    #[On('category-delete-id')]
    public function setProductId(Category $data)
    {
        $this->category = $data;
        $this->categoryName = $data->name;
    }

    public function delete()
    {
        // Delete the post
        $this->category->delete();

        $this->dispatch($this->modalName, 'close'); // close modal
        $this->resetInput(); // reset input modal
        $this->dispatch('refreshDatatable'); // refresh table
    }

    #[On('reset-modal')]
    public function resetInput()
    {
        $this->resetExcept(['modalName']);
    }

    public function render()
    {
        return view('pages.admin.category.livewire.delete-confirmation');
    }
}
