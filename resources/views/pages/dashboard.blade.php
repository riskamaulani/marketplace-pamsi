@extends('layouts.admin')

@section('title', 'News')

@section('pagetitle', 'News')

@section('content')
<section class="p-4 space-y-4 ">
  <div class="flex justify-between items-center">
    <h2 class="font-bold text-[#012970] text-3xl">Dashboard Toko</h2>


  </div>


</section>
<section class="space-y-4 ">

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- Card 1 -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
      <div class="bg-blue-500 text-white p-3 rounded-full">
        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
        </svg>


      </div>
      <div>
        <p class="text-gray-600">Jumlah Produk Terjual</p>
        <p class="text-2xl font-bold">{{$totalSales}}</p>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
      <div class="bg-green-500 text-white p-3 rounded-full">
        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
      </div>
      <div>
        <p class="text-gray-600">Jumlah Penjualan</p>
        <p class="text-2xl font-bold">Rp {{Number::format($totalRevenue)}}</p>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
      <div class="bg-yellow-500 text-white p-3 rounded-full">
        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>
      </div>
      <div>
        <p class="text-gray-600">Jumlah Pembeli</p>
        <p class="text-2xl font-bold">{{$totalBuyers}}</p>
      </div>
    </div>


  </div>



</section>

<section>
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
    <div class="p-4 bg-white rounded-lg shadow">
      <!-- <div class="flex justify-between items-center ">
      <h4 class="font-bold text-[#012970] text-xl">Laporan Pendapatan</h4>
    </div> -->
      <div wire:key="chart-product-sales" class="card-body">
        <!-- Line Chart -->

        @if(auth()->user()->isAdmin())
        {{-- Untuk Admin: Menampilkan semua data --}}
        @livewire('sales-chart', ['shopId' => null])
        @else
        {{-- Untuk Non-Admin: Hanya menampilkan data toko terkait --}}
        @livewire('sales-chart', ['shopId' => auth()->user()->shop->id])
        @endif







      </div>

    </div>

    <div class="p-4 bg-white rounded-lg shadow">
      <!-- <div class="flex justify-between items-center ">
      <h4 class="font-bold text-[#012970] text-xl">Laporan Penjualan</h4>
    </div> -->
      <div wire:key="chart-revenue" class="card-body">
        <!-- Line Chart -->

        @livewire('chart-revenue', [], key('chart-revenue'))




      </div>
    </div>
  </div>
</section>

@endsection