<?php

namespace App\Livewire\ShopResources;

use App\Actions\GenerateOpenSchedule;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class ShopTable extends DataTableComponent
{
    protected $model = Shop::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setAdditionalSelects(['shops.foto as foto', 'shops.manager as manager', 'shops.open_schedule as open_schedule']);

        $this->setDefaultSort('shops.created_at', 'desc');

        $this->setSearchPlaceholder('Cari toko...');
        $this->setSearchDebounce(500);

        $this->setEmptyMessage('Data tidak ditemukan.');
    }


    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->searchable(),
            Column::make("Foto")
                ->label(fn ($row) => $this->getShopFoto($row->foto))->html(),
            Column::make("Nama", "name")
                ->sortable()->searchable(),
            Column::make("Akun", "user.username")
                ->sortable()->searchable(),
            Column::make('Pengelola', 'manager')
                ->collapseAlways()
                ->label(fn ($row) =>  $this->getManager(json_decode($row->manager))),
            Column::make('Jadwal Buka', 'open_schedule')
                ->collapseAlways()
                ->label(fn ($row) =>  (new GenerateOpenSchedule())->handle($row->open_schedule)),
        ];
    }

    public function getManager($data)
    {
        $result = null; $status = false;
        foreach($data as $key=>$value) {
            if ($key != array_key_last($data)+1 && $status) {
                $result .= ', ';
            } else {
                $status = true;
            }

            $result .= $value;
        }

        return $result ?? '-';
    }

    public function getShopFoto($data)
    {
        if($data == null) {
            return "-";
        }

        return '<a href="'.asset('storage/'.$data).'" target="_blank"><img src="'.asset('storage/'.$data).'" alt="Pamsi" class="h-10 object-contain" /></a>';
    }
}
