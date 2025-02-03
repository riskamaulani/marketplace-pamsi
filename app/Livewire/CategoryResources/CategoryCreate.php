<?php

namespace App\Livewire\CategoryResources;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $modalName = '';

    public $name = '';

    public function save()
    {
        Category::create([
            'name' => $this->name,
        ]);

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
        return view('pages.admin.category.livewire.create-form');
    }
}
