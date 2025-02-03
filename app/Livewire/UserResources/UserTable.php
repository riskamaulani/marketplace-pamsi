<?php

namespace App\Livewire\UserResources;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setAdditionalSelects(['users.role as role']);

        $this->setDefaultSort('created_at', 'desc');

        $this->setSearchPlaceholder('Cari pengguna...');
        $this->setSearchDebounce(500);

        $this->setEmptyMessage('Data tidak ditemukan.');
    }

    public function builder(): Builder
    {
        return User::query()->where('role', '!=', 'admin');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->searchable(),
            Column::make("Name", "name")
                ->sortable()->searchable(),
            Column::make("Email", "email")
                ->sortable()->searchable(),
            Column::make("Username", "username")
                ->sortable()->searchable(),
            Column::make("No. Hp", "contact")
                ->searchable(),
            Column::make("Toko")
                ->label(
                fn ($row) => view('components.table.shop-activate-deactivate')->with([
                    'data' => $row,
                    'activate' => 'shop-activate',
                ])),
        ];
    }
}
