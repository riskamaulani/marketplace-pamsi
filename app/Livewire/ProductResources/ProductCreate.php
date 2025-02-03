<?php

namespace App\Livewire\ProductResources;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $modalName = '';

    #[Validate('image')]
    public $image;

    public $categories = [];

    public $name = '', $price = 1, $description = '', $category_id = null, $stock = 0, $order_type = 'in-stock', $status = 'ready';

    public function mount()
    {
        $this->updateCategories();
    }

    public function save()
    {
        $imageUrl = $this->image->store('products', 'public');

        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $this->category_id === 'other' ? null : $this->category_id,
            'image' => $imageUrl,
            'stock' => $this->stock,
            'status' => $this->status,
            'shop_id' => session('shop_id') ?? Auth::user()->shop->id,
            'order_type' => $this->order_type
        ]);

        $this->dispatch($this->modalName, 'close'); // close modal
        $this->resetInput(); // reset input modal
        $this->dispatch('refreshDatatable'); // refresh table
    }

    #[On('reset-modal')]
    public function resetInput() {
        $this->resetExcept(['modalName']);
    }

    public function updateCategories()
    {
        // Ambil semua kategori dari database
        $categories = Category::select('id', 'name')->get()->toArray();

        // Tambahkan opsi "Lainnya" di posisi pertama
        $this->categories = array_merge(
            [['id' => "other", 'name' => 'Lainnya']],
            $categories
        );
    }

    public function render()
    {
        $this->updateCategories();
        return view('pages.admin.product.livewire.create-form');
    }
}
