<div x-data="{ status: null, tempStatus: null, products: null, data: null }" class="space-y-5"
    @detail-order.window="status = tempStatus = $event.detail.status, products = $event.detail.products; data = $event.detail.data;"
    @update-status-order.window="status = $event.detail[0].status">
    <div class="space-y-1">
        <p class="font-semibold">Pesanan {{ (new \App\Actions\ShippingStatus())->handle($status ?? '') }}</p>

        <div x-show="status != 'done'" class="flex gap-3 justify-between items-center">
            <div class="flex gap-5">
                <div x-show="status == 'process'" class="flex gap-1 items-center">
                    <input type="radio" value="process" x-model="tempStatus">
                    <p class="text-sm">Diproses</p>
                </div>
                <div class="flex gap-1 items-center">
                    <input type="radio" value="shipping" x-model="tempStatus">
                    <p class="text-sm">Dikirim</p>
                </div>
                <div class="flex gap-1 items-center">
                    <input type="radio" value="done" x-model="tempStatus">
                    <p class="text-sm">Selesai</p>
                </div>
            </div>

            <button @click="$dispatch('update-order-status', { data: tempStatus })"
                class="py-1 px-2 text-sm text-white bg-myaccent rounded-md">Perbarui</button>
        </div>
    </div>

    <hr>

    <div class="space-y-1">
        <p class="font-semibold">Detail Produk</p>

        <div class="space-y-2">
            <template x-for="product in products" :key="product.id">
                <div class="flex gap-2 items-center justify-between border-t border-dashed">
                    <div class="pt-2 flex gap-2">
                        <img :src="`{{ asset('') }}${product.image}`" alt="Produk"
                            class="h-12 object-cover object-center aspect-square rounded-sm">

                        <div>
                            <p class="text-sm font-semibold line-clamp-2" x-text="product.name"></p>
                            <p class="text-[12px]">Rp<span x-text="product.price"></span></p>
                        </div>

                    </div>

                    <p>x <span class="text-xl font-semibold" x-text="product.quantity"></span></p>
                </div>
            </template>
        </div>
    </div>

    <hr>

    <div class="space-y-1">
        <p class="font-semibold">Info Pengiriman</p>

        <div class="space-y-1">
            <div class="flex gap-1">
                <p class="w-28 text-sm font-medium shrink-0">Pengiriman</p>
                <p class="text-sm"
                    x-text="data?.shipping === 'take-self' ? 'Ambil Sendiri' : (data?.shipping === 'courier-in-mataram' ? 'Kurir (Daerah Mataram)' : 'Kurir (Luar Mataram)')">
                </p>
            </div>

            <div class="flex gap-1">
                <p class="w-28 text-sm font-medium shrink-0">Alamat</p>
                <p class="text-sm" x-text="data?.address"></p>
            </div>
        </div>
    </div>

    <hr>

    <div class="space-y-1">
        <div class="flex gap-1 items-center justify-between">
            <p class="text-sm">Pembayaran</p>
            <p class="text-sm"
                x-text="data?.payment === 'cod' ? 'COD' : (data?.payment === 'transfer' ? 'Transfer' : 'E-Wallet')"></p>
        </div>
        <div class="flex gap-1 items-center justify-between">
            <p class="text-sm">Total Harga (<span x-text="data?.productsQuantity"></span> produk)</p>
            <p class="text-sm">Rp<span x-text="data?.totalProduct"></span></p>
        </div>
        <div class="flex gap-1 items-center justify-between">
            <p class="text-sm">Total Ongkos Kirim</p>
            <p class="text-sm">Rp<span x-text="data?.shippingFee"></span></p>
        </div>
        <div class="flex gap-1 items-center justify-between border-t">
            <p class="font-semibold">Total Pesanan</p>
            <p class="font-semibold">Rp<span x-text="data?.total"></span></p>
        </div>
    </div>
</div>
