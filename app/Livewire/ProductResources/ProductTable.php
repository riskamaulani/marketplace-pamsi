<?php

namespace App\Livewire\ProductResources;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setAdditionalSelects(['products.image as image', 'products.order_type as order', 'products.stock as stock', 'products.status as status']);

        $this->setDefaultSort('created_at', 'desc');

        $this->setSearchPlaceholder('Cari produk...');
        $this->setSearchDebounce(500);

        $this->setEmptyMessage('Data tidak ditemukan.');
    }

    public function builder(): Builder
    {
        return Product::query()->where('shop_id', session('shop_id') ?? Auth::user()->shop->id);
    }

    public function columns(): array
    {
        return [
            Column::make("Kode", "id")
                ->sortable()->searchable(),
            ImageColumn::make('Image')
                ->location(
                    fn($row) => asset('storage/'.$row->image)
                )
                ->attributes(fn($row) => [
                    'class' => 'h-10 object-contain',
                    'alt' => 'Pamsi',
                ]),
            Column::make("Nama", "name")
                ->sortable()->searchable(),
            Column::make("Harga", "price"),
            Column::make("Jenis Pemesanan")
                ->label(fn ($row) => $this->getOrderType($row)),
            Column::make("Stok")
                ->label(fn ($row) => $this->getStock($row)),
            Column::make("Terjual", 'sold'),
            Column::make("Status")
                ->label(fn ($row) => $this->getStatus($row))->html(),
            Column::make("Aksi")
                ->label(
                fn ($row) => view('components.table.view-edit-delete')->with([
                    'id' => $row->id,
                    'edit' => 'product-edit',
                    'delete' => 'product-delete'
                ])),
        ];
    }

    public function getStatus($row)
    {
        $stock = 0;
        if($row->order != 'in-stock') {
            if($row->status == 'Habis') $stock = 0;
            else $stock = 1;
        } else {
            $stock = $row->stock;
        }

        if($stock == 0) {
            return '<span class="text-white py-1 px-2 bg-red-600 rounded-full">Habis</span>';
        } else {
            return '<span class="text-white py-1 px-2 bg-myaccent rounded-full">Tersedia</span>';
        }
    }

    public function getOrderType($row)
    {
        if($row->order == 'in-stock') {
            return 'Ready Stok';
        }

        return 'Pre-Order';
    }

    public function getStock($row)
    {
        if($row->order == 'in-stock') {
            return $row->stock;
        }

        return '-';
    }
}
