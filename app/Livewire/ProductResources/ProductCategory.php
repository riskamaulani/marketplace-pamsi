<?php

namespace App\Livewire\ProductResources;

use App\Models\Category;
use Livewire\Component;

class ProductCategory extends Component
{
    public $categories;
    public $selectedCategory;

    public function mount()
    {
        $this->categories = Category::all();
        $this->selectedCategory = request('category'); // Ambil kategori dari URL
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        return redirect()->route('home', ['category' => $categoryId]); // Ubah URL
    }

    public function render()
    {
        return view('livewire.product-category', [
            'categories' => $this->categories,
            'selectedCategory' => $this->selectedCategory
        ]);
    }
}
