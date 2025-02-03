<?php

namespace App\Livewire\ProductResources;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;

class ProductDelete extends Component
{
    public $modalName = '';
    public Product $product;
    public $productName = '';

    #[On('product-delete-id')]
    public function setProductId(Product $data)
    {
        $this->product = $data;
        $this->productName = $data->name;
    }

    #[On('reset-modal')]
    public function resetInput()
    {
        $this->resetExcept(['modalName']);
    }

    public function delete()
    {
        // Delete the old image file if it exists
        if ($this->product->image) {
            Storage::disk('public')->delete($this->product->image);
        }

        // Delete the post
        $this->product->delete();

        $this->dispatch($this->modalName, 'close'); // close modal
        $this->resetInput(); // reset input modal
        $this->dispatch('refreshDatatable'); // refresh table
    }

    public function render()
    {
        return view('pages.admin.product.livewire.delete-confirmation');
    }
}
