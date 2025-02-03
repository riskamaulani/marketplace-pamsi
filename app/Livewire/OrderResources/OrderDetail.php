<?php

namespace App\Livewire\OrderResources;

use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;

class OrderDetail extends Component
{
    public $modalName = '';

    public Order $order;
    public $status;

    #[On('order-detail-id')]
    public function updateModel(Order $order)
    {
        $this->order = $order;
        $this->status = $order->status;
    }

    #[On('update-order-status')]
    public function updateStatus($data)
    {
        if($data == $this->status) return;

        // update order status
        $this->order->status = $data;
        $this->order->save();

        $this->status = $data;

        $this->dispatch('reload-page');
        $this->dispatch('update-status-order', ['status' => $data]);
        $this->dispatch('refreshDatatable'); // refresh table
    }

    public function render()
    {
        return view('pages.admin.order.livewire.order-detail');
    }
}
