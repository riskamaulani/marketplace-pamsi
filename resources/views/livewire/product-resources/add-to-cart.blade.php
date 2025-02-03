<div x-data="{
    total: 1,
    price: {{ $product->price }},
    getTotal() { return this.total * this.price },
    product: [{
        'product_id': '{{ $product->id }}',
        'price': {{ $product->price }},
        'total': 1
    }],
    updateTotal(number) {
        this.total += number;
        this.product[0].total = this.total;
    },
    setTotal(event) {
        let newTotal = parseInt(event.target.value, 10);
        if (!isNaN(newTotal) && newTotal >= 1) {
            this.total = newTotal;
        } else {
            this.total = 1;
        }
        this.product[0].total = this.total;
    }
}" @reset-total.window="total = 1"
    class="lg:sticky lg:top-4 p-4 mx-auto w-full max-w-72 h-fit space-y-4 bg-white rounded-lg shadow">
    <h5 class="font-semibold">Atur pesanan</h5>

    <div class="flex gap-3 items-center">
        <div class="px-1 w-fit flex items-center justify-between border border-myaccent rounded-lg">
            <button type="button" class="p-1 rounded-md" :class="total > 1 ? 'bg-gray-200 hover:bg-gray-300' : ''"
                @click="updateTotal(-1)" :disabled="total <= 1">
                <svg class="size-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 2">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h16" />
                </svg>
            </button>
            <input type="text" x-model="total" class="h-8 text-sm text-center w-14 focus:ring-0 border-none"
                min='1' @input="setTotal" required />
            <button type="button" class="p-1 bg-gray-200 hover:bg-gray-300 rounded-md" @click="updateTotal(1)">
                <svg class="size-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </button>
        </div>

        <p class="text-sm">Stok Total: <span class="font-semibold">{{ $product->stock }}</span></p>
    </div>

    <div class="flex gap-2 justify-between items-center">
        <p class="text-[#6d7588] text-sm font-semibold">Subtotal</p>
        <p class="text-xl font-bold">Rp<span x-text="getTotal()">{{ $product->price }}</span></p>
    </div>

    <x-primary-button @click="$dispatch('add-to-cart', {total})" class="mt-5 py- w-full justify-center"><span
            class="text-sm text-white font-semibold">Keranjang</span></x-primary-button>

    <div>
        <a x-bind:href="'{{ route('checkout') }}?state=' + btoa(JSON.stringify(product))"
            class="group mt-2 w-full inline-flex justify-center items-center px-4 py-2 bg-white hover:bg-myaccent border border-myaccent rounded-md tracking-widest transition ease-in-out duration-150'"><span
                class="text-sm text-gray-900 group-hover:text-white font-semibold">Pesan Sekarang</span></a>
    </div>
</div>
