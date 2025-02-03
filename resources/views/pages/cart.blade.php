@extends('layouts.app')

@section('title', 'Keranjang')

@section('content')
    <div class="space-y-5">
        {{-- Header section --}}
        <section class="px-4 py-3 bg-white rounded-lg shadow-md">
            <p class="text-xl text-[#212529] font-semibold">Keranjang</p>
        </section>

        {{-- Main section --}}
        <section x-data="{
            selectedProducts: [],
            totalPrice: 0,
            toggleProduct(product_id, price, total, event) {
                if (event.target.checked) {
                    this.selectedProducts.push({
                        'product_id': product_id,
                        'price': price,
                        'total': total
                    });
                } else {
                    const index = this.selectedProducts.findIndex(product => product.product_id === product_id);
                    if (index !== -1) {
                        this.selectedProducts.splice(index, 1);
                    }
                }
            },
            updateQuantity(product_id, total) {
                const index = this.selectedProducts.findIndex(product => product.product_id === product_id);
                if (index !== -1) {
                    this.selectedProducts[index].total = total;
                }
            },
            sumTotal() {
                return this.selectedProducts.reduce((sum, product) => sum + product.total, 0);
            },
            sumPrice() {
                return this.selectedProducts.reduce((sum, product) => sum + product.price * product.total, 0);
            },
        }" class="flex gap-5 flex-col lg:flex-row">
            <div class="flex-1 max-w-5xl space-y-4">
                <!-- Display Saved Products -->
                {{-- <h3>Selected Products:</h3>
                <pre x-text="JSON.stringify(selectedProducts, null, 2)"></pre> --}}

                @foreach ($carts as $shop)
                    <div class="px-5 pt-3  bg-white shadow rounded-lg">
                        <p class="text-sm font-bold">{{ $shop['shop_name'] }}</p>

                        <div class="mt-1 divide-y">
                            @foreach ($shop['products'] as $product)
                                <div x-data="{
                                    total: {{ $product->total }},
                                    updateTotal(number) {
                                        this.total += number;
                                        updateQuantity('{{ $product->id }}', this.total);
                                    },
                                    setTotal(event) {
                                        let newTotal = parseInt(event.target.value, 10);
                                        if (!isNaN(newTotal) && newTotal >= 1) {
                                            this.total = newTotal;
                                            updateQuantity('{{ $product->id }}', this.total);
                                        } else {
                                            this.total = 1;
                                        }
                                    }
                                }" class="py-2 flex gap-2 items-center">
                                    <input class="rounded-sm" type="checkbox" value="{{ $product->id }}"
                                        :disabled="{{ $product->stock }} === 0"
                                        @change="toggleProduct('{{ $product->id }}', {{ $product->price }}, total, $event)">

                                    <div class="flex-1 flex justify-between items-center">
                                        <p class="text-sm flex-1">{{ $product->name }}</p>
                                        <p class="text-sm">Rp{{ $product->price }}</p>
                                        <div
                                            class="mx-8 px-1 w-fit flex items-center justify-between border border-myaccent rounded-lg">
                                            <button type="button" class="p-1 rounded-md"
                                                :class="total > 1 ? 'bg-gray-200 hover:bg-gray-300' : ''"
                                                @click="updateTotal(-1)" :disabled="total <= 1">
                                                <svg class="size-3 text-gray-900" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" x-model="total"
                                                class="h-8 text-sm text-center w-14 focus:ring-0 border-none" min='1'
                                                @input="setTotal" required />
                                            <button type="button" class="p-1 bg-gray-200 hover:bg-gray-300 rounded-md"
                                                @click="updateTotal(1)">
                                                <svg class="size-3 text-gray-900" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                        <svg @click="$dispatch('cart-delete', { productId: '{{ $product->id }}' })"
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="hover:cursor-pointer hover:fill-red-600"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="lg:sticky lg:top-4 p-4 mx-auto w-full max-w-96 h-fit space-y-3 bg-white rounded-lg shadow">
                <h4 class="text-lg font-bold">Ringkasan</h4>

                <div class="space-y-2">
                    <div class="flex gap-2 items-center justify-between">
                        <p class="font-semibold">Jumlah Produk</p>
                        <p class="font-semibold" x-text="sumTotal()"></p>
                    </div>

                    <div class="flex gap-2 items-center justify-between">
                        <p class="font-semibold">Total Harga</p>
                        <p class="font-semibold" x-text="`Rp${sumPrice()}`"></p>
                    </div>
                </div>

                <div>
                    <a :href="sumTotal() != 0 ? '{{ route('checkout') }}?state=' + btoa(JSON.stringify(selectedProducts)) : ' # '"
                        class="mt-2 w-full inline-flex justify-center items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest transition ease-in-out duration-150"
                        :class="{ 'bg-myaccent hover:bg-myaccenthover active:bg-myaccent': sumTotal() != 0 }"><span
                            class="text-sm text-white font-semibold">Checkout</span></a>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('other-components')
    <livewire:cart-resources.cart-delete />
@endpush
