<?php

namespace App\Livewire\ProductResources;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ProductAll extends Component
{
    public $products = [];
    public $category;
    public $search;
    public $limit = 10; // Jumlah produk yang ditampilkan awalnya
    public $hasMore = true; // Indikator apakah masih ada data

    public function mount()
    {
        $this->category = request()->get('category');
        $this->search = request()->get('search');
        $this->loadProducts();
    }

    public function loadProducts()
    {
        // Cache key untuk pencarian
        $cacheKey = $this->generateCacheKey();

        // Ambil semua produk dari cache
        $allProducts = Cache::remember($cacheKey, now()->addMinutes(10), function () {
            return $this->fetchProducts();
        });

        // Ambil subset produk sesuai dengan limit saat ini
        $newProducts = $allProducts->slice(count($this->products), $this->limit);

        if ($newProducts->isEmpty()) {
            $this->hasMore = false; // Tidak ada lagi data yang dapat dimuat
            return;
        }

        $this->products = array_merge($this->products, $newProducts->toArray());
    }

    protected function generateCacheKey()
    {
        $key = 'products';
        if ($this->category) {
            $key .= "_category_{$this->category}";
        }
        if ($this->search) {
            $key .= "_search_" . md5($this->search); // Menghindari panjang string yang berlebihan
        }
        return $key;
    }

    protected function fetchProducts()
    {
        return Product::query()
            ->when($this->category, function ($query) {
                $query->where('category_id', $this->category);
            })
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'LIKE', "%{$this->search}%")
                        ->orWhere('description', 'LIKE', "%{$this->search}%");
                });
            })
            ->inRandomOrder()
            ->get();
    }

    public function render()
    {
        return view('livewire.product-resources.product-all', [
            'products' => $this->products,
        ]);
    }
}
