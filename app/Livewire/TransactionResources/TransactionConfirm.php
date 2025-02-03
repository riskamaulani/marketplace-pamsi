<?php

namespace App\Livewire\TransactionResources;

use App\Models\Order;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;

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

    public function accept()
    {
        $this->transaction->status = 'accept';
        $this->transaction->save();

        Order::where('transaction_id', $this->transaction->id)->update(['status' => 'process']);

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
