<?php

namespace App\Livewire\CategoryResources;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;

class CategoryTable extends DataTableComponent
{
    protected $model = Category::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setDefaultSort('name', 'asc');

        $this->setSearchPlaceholder('Cari kategori...');
        $this->setSearchDebounce(500);

        $this->setEmptyMessage('Data tidak ditemukan.');
    }

    public function builder(): Builder
    {
        return Category::query()->withCount('products');
    }

    public function columns(): array
    {
        return [
            Column::make("Kode", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nama", "name")
                ->sortable()
                ->searchable(),
            Column::make("Total Produk")
                ->label(fn ($row) => $row->products_count),
            Column::make("Aksi")
                ->label(
                fn ($row) => view('components.table.view-edit-delete')->with([
                    'id' => $row->id,
                    'edit' => 'category-edit',
                    'delete' => 'category-delete'
                ])),
        ];
    }
}
