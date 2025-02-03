<?php

namespace App\Livewire\ShopResources;

use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShopProfile extends Component
{
    Use WithFileUploads;

    public $image;
    public Shop $shop;

    public function save()
    {
        if($this->image == null) return;

        $imageUrl = $this->image->store('shops', 'public');

        // Delete the old image file if it exists
        if ($this->shop->foto) {
            Storage::disk('public')->delete($this->shop->foto);
        }

        $this->shop->foto = $imageUrl;
        $this->shop->save();

        $this->dispatch('reload-page');
    }

    public function render()
    {
        return view('livewire.shop-resources.shop-profile');
    }
}
