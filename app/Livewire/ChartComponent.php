<?php

namespace App\Livewire;

use Livewire\Component;

class ChartComponent extends Component
{

    public $chartData = [];

    public function mount()
    {
        $this->chartData = [
            'series' => [[
                'name' => 'Sales',
                'data' => [10, 20, 30, 40, 50]
            ]],
            'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei']
        ];
    }
    
    public function render()
    {
        return view('livewire.chart-component');
    }
}

