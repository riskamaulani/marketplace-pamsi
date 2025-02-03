<?php

namespace App\Livewire\ProductResources;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class ProductEdit extends Component
{
    use WithFileUploads;

    public $modalName = '';

    public Product $product;

    #[Validate('image')]
    public $image, $imageTemp;

    public $categories = [];

    public $name = '', $price = 1, $description = '', $category_id = null, $stock = 0, $order_type = 'in-stock', $status = 'ready';

    public function mount()
    {
        $this->updateCategories();
    }

    #[On('product-edit-id')]
    public function setProductId(Product $data)
    {
        $this->product = $data;
        $this->image = $data->image;
        $this->name = $data->name;
        $this->price = $data->price;
        $this->description = $data->description;
        $this->category_id = $data->category_id;
        $this->stock = $data->stock;
        $this->order_type = $data->order_type;
        $this->status = $data->status;
    }

    public function save()
    {
        // check if image was updated
        if($this->imageTemp) {
            // Delete the old image file if it exists
            if ($this->product->image) {
                Storage::disk('public')->delete($this->product->image);
            }

            $this->product->image =  $this->imageTemp->store('products', 'public');
        }

        // update product data
        $this->product->name = $this->name;
        $this->product->price = $this->price;
        $this->product->description = $this->description;
        $this->product->category_id = $this->category_id === 'other' ? null : $this->category_id;

        $this->product->stock = $this->stock;
        $this->product->order_type = $this->order_type;
        $this->product->status = $this->status;

        $this->product->save(); // save product data

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
        return view('pages.admin.product.livewire.edit-form');
    }
}
