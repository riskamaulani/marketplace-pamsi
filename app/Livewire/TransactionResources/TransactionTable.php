<?php

namespace App\Livewire\TransactionResources;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Transaction;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class TransactionTable extends DataTableComponent
{
    protected $model = Transaction::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setAdditionalSelects(['transactions.bill as bill', 'transactions.status as status']);

        $this->setDefaultSort('created_at', 'desc');

        $this->setSearchPlaceholder('Cari transaksi...');
        $this->setSearchDebounce(500);

        $this->setEmptyMessage('Data tidak ditemukan.');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->searchable(),
            Column::make("Bukti")
                ->label(fn ($row) => $this->getBill($row->bill))->html(),
            Column::make("Total", "total"),
            Column::make("Payment", "payment"),
            Column::make("Address", "address"),
            Column::make("Username", "user.username")
                ->searchable(),
            Column::make("No HP", "user.contact"),
            Column::make("Tanggal", "created_at")
            ->sortable(),
            Column::make("Status")
                ->label(
                fn ($row) => view('components.table.trx-confirm-reject')->with([
                    'data' => $row,
                ])),
        ];
    }

    public function getBill($data)
    {
        if($data == null) {
            return "-";
        }

        return '<a href="'.asset('storage/'.$data).'" target="_blank"><img src="'.asset('storage/'.$data).'" alt="Bukti" class="h-10 object-contain" /></a>';
    }
}
