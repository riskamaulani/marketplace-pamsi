<?php

namespace App\Livewire\TransactionResources;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TransactionConfirm extends Component
{
    public $modalName = '';
    public Transaction $transaction;
    public $transactionId = '', $mode;

    #[On('trx-id')]
    public function setProductId(Transaction $data, $mode)
    {
        $this->transaction = $data;
        $this->transactionId = $data->id;
        $this->mode = $mode;
    }

    #[On('reset-modal')]
    public function resetInput()
    {
        $this->resetExcept(['modalName']);
    }

    public function confirm()
    {
        if($this->mode == 'accept') {
            $this->accept();
        } else {
            $this->reject();
        }
    }

    // public function accept()
    // {
    //     $this->transaction->status = 'accept';
    //     $this->transaction->save();

    //     Order::where('transaction_id', $this->transaction->id)->update(['status' => 'process']);


    //     $this->clearModal();
    // }

    public function accept()
{
    // Ubah status transaksi menjadi 'accept'
    $this->transaction->status = 'accept';
    $this->transaction->save();

    // Ubah status pesanan menjadi 'process'
    Order::where('transaction_id', $this->transaction->id)->update(['status' => 'process']);

    // Ambil semua pesanan terkait transaksi ini
    $orders = Order::where('transaction_id', $this->transaction->id)->get();

    // Iterasi setiap order
    foreach ($orders as $order) {
        // Decode JSON dalam field products
        $products = json_decode($order->products, true);

        if (is_array($products)) {
            foreach ($products as $product) {
                // Kurangi stok produk berdasarkan ID dan quantity dari JSON
                Product::where('id', $product['id'])
                    ->decrement('stock', $product['quantity']);
            }
        }
    }

    // Tutup modal atau lakukan tindakan lainnya
    $this->clearModal();
}



    public function reject()
    {
        $this->transaction->status = 'reject';
        $this->transaction->save();

        Order::where('transaction_id', $this->transaction->id)->update(['status' => 'reject']);

        $this->clearModal();
    }

    public function clearModal()
    {
        $this->dispatch($this->modalName, 'close'); // close modal
        $this->resetInput(); // reset input modal
        $this->dispatch('refreshDatatable'); // refresh table
    }

    public function render()
    {
        return view('pages.admin.transaction.livewire.transaction-confirm');
    }
}
