<?php

namespace App\Livewire\OrderResources;

use App\Actions\ShippingStatus;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OrderTable extends DataTableComponent
{
    protected $model = Order::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setAdditionalSelects(['orders.status as status', 'orders.products as products', 'orders.products_quantity as products_quantity', 'orders.shipping as shipping', 'orders.total as total', 'orders.status as status', 'transactions.address as address', 'transactions.payment as payment']);

        $this->setDefaultSort('orders.updated_at', 'desc');

        $this->setSearchPlaceholder('Cari pesanan...');
        $this->setSearchDebounce(500);

        $this->setEmptyMessage('Data tidak ditemukan.');
    }

    public function builder(): Builder
    {
        return Order::query()->leftJoin('transactions', 'orders.transaction_id', '=', 'transactions.id')->where('orders.shop_id', session('shop_id') ?? Auth::user()->shop->id)->where('orders.status', '!=', 'confirm')->where('orders.status', '!=', 'reject');
    }

    public function columns(): array
    {
        return [
            Column::make("Tanggal Order", "created_at"),
            Column::make("Kode Pesanan", "id")
                ->searchable(),
            Column::make("Total Produk", "total_product"),
            Column::make("Pengiriman")
                ->label(fn ($row) => $this->getShipping($row->shipping)),
            Column::make("Biaya Ongkir", "shipping_fee"),
            Column::make("Status")
                ->label(fn ($row) => (new ShippingStatus)->handle($row->status)),
            Column::make("Note", "note")->collapseAlways(),
            Column::make("Aksi")
                ->label(
                fn ($row) => view('components.table.detail')->with([
                    'data' => $row,
                    'detail' => 'order-detail',
                ])),
        ];
    }

    public function getShipping($data)
    {
        if($data == 'courier-in-mataram') return "Kurir (Daerah Mataram)";
        if($data == 'courier-in-mataram') return "Kurir (Luar Mataram)";
        return "Ambil Sendiri";
    }
}
