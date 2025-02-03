<?php

namespace App\Livewire\ShopResources;

use App\Models\Shop;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ShopActivate extends Component
{
    public $modalName = '';

    public User $user;


    #[On('shop-activate-id')]
    public function setUserId(User $data)
    {
        $this->user = $data;
    }


    public function activate()
    {
        Shop::create([
            'manager' => json_encode([$this->user->name]),
            'open_schedule' => json_encode([0, 0, 0, 0, 0, 0, 0]),
            'user_id' => $this->user->id
        ]);

        $this->user->role = 'penjual';
        $this->user->forced_logout = true;
        $this->user->save();

        $this->dispatch($this->modalName, 'close'); // close modal
        $this->resetInput(); // reset input modal
        $this->dispatch('refreshDatatable'); // refresh table
    }

    #[On('reset-modal')]
    public function resetInput()
    {
        $this->resetExcept(['modalName']);
    }

    public function render()
    {
        return view('pages.admin.shop.livewire.shop-activate');
    }
}
