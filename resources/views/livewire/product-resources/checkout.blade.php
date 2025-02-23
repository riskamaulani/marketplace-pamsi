<section x-data="{
    shops: @entangle('shops'),
    price: { 'take-self': 0, 'courier-in-mataram': 10000, 'courier-out-mataram': 0 },
    calculateTotalShipping() {
        return Object.values(this.shops).reduce((total, shop) => {
            const shipping = shop.shipping;
            const price = this.price[shipping] || 0;
            return total + price;
        }, 0);
    },
    updateShipping(shopId, shippingMethod) {
        this.shops[shopId].shipping = shippingMethod;
    },
    overallTotalPrice() {
        return {{ $overallTotalPrice }} + this.calculateTotalShipping();
    },
    address: @entangle('address'),
    payment: @entangle('payment'),
    image: @entangle('image'),
    errors: {},
    validate() {
        this.errors = {};
        if (!this.address) {
            this.errors.address = 'Masukkan Alamat Pengiriman';
        }
        if (this.payment != 'cod' && !this.image) {
            this.errors.image = 'Upload bukti pembayaran';
        }
        return Object.keys(this.errors).length === 0;
    },
    showModal: false,
    confirmAndSubmit() {
        if (this.validate()) {
            @this.call('checkout');
        }
        this.showModal = false;
    }
}" class="flex gap-5 flex-col lg:flex-row">
    <div class="flex-1 max-w-5xl space-y-4">
        <!-- Display Saved Products -->
        {{-- <h3>Selected Products:</h3>
        <pre x-text="JSON.stringify(shops, null, 2)"></pre> --}}

        @foreach ($shops as $shop)
        <div class="px-5 py-4 bg-white shadow rounded-lg">
            <p class="text-sm font-bold">{{ $shop['shop_name'] }}</p>

            <div class="mt-1">
                @foreach ($shop['products'] as $product)
                <div class="py-2 flex gap-2 items-start">
                    <img src="{{ asset('storage/' . $product['image']) }}" alt="Pamsi"
                        class="size-14 object-cover object-center aspect-square rounded-md">
                    <div class="flex-1 flex justify-between items-center">
                        <p class="text-sm flex-1">{{ $product['name'] }}</p>
                        <p class="text-sm font-semibold">{{ $product['quantity'] }} x
                            Rp{{ $product['price'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="pt-1 flex gap-2 items-center justify-between border-t">
                <p class="font-semibold">Total</p>
                <p class="font-semibold">Rp{{ $shop['total_shop_price'] }}</p>
            </div>

            <div class="mt-3 space-y-2">
                <div>
                    <x-input-label for="note-{{ $shop['shop_id'] }}" value="Catatan (Opsional)" />
                    <x-text-input id="note-{{ $shop['shop_id'] }}" class="block mt-1 w-full text-sm" type="text"
                        name="note-{{ $shop['shop_id'] }}" x-model="shops['{{ $shop['shop_id'] }}'].note"
                        autocomplete="note" />
                </div>


            </div>
        </div>
        @endforeach
    </div>

    <form wire:submit.prevent="checkout"
        class="lg:sticky lg:top-4 p-4 mx-auto w-full max-w-96 h-fit space-y-3 bg-white rounded-lg shadow">
        <div>
            <x-input-label for="address" value="Alamat Pengiriman" />
            <x-text-area id="address" class="block mt-1 w-full text-sm" name="address" autocomplete="address"
                wire:model="address" required></x-text-area>
            <span x-show="errors.address" class="text-red-500 text-sm" x-text="errors.address"></span>
        </div>
        <div>
            <x-input-label for="shipping-{{ $shop['shop_id'] }}" value="Pilih pengiriman" />
            <x-select-input id="shipping-{{ $shop['shop_id'] }}" class="block mt-1 w-full"
                name="shipping-{{ $shop['shop_id'] }}" x-model="shops['{{ $shop['shop_id'] }}'].shipping"
                @change="updateShipping('{{ $shop['shop_id'] }}', $event.target.value)" :items="[
                                [
                                    'value' => 'take-self',
                                    'name' => 'Ambil Sendiri',
                                ],
                                [
                                    'value' => 'courier-in-mataram',
                                    'name' => 'Kurir (Daerah Mataram) | Rp10.000',
                                ],
                                [
                                    'value' => 'courier-out-mataram',
                                    'name' => 'Kurir (Luar Mataram) | Hubungi Admin',
                                ],
                            ]"
                required />


        </div>
        <div class="border-t-2 border-dashed border-gray-200 my-4"></div>


        <h4 class="text-lg font-bold">Ringkasan</h4>

        <div class="space-y-2">
            <div class="flex gap-2 items-center justify-between">
                <p class="font-semibold">Jumlah Produk</p>
                <p class="font-semibold">{{ $productTotal }}</p>
            </div>

            <div class="flex gap-2 items-center justify-between">
                <p class="font-semibold">Total Harga</p>
                <p class="font-semibold">Rp{{ $overallTotalPrice }}</p>
            </div>

            <div class="flex gap-2 items-center justify-between">
                <p class="font-semibold">Total Ongkir</p>
                <p class="font-semibold" x-text="'Rp' + calculateTotalShipping()"></p>
            </div>

            <div class="border-t pt-2 flex gap-2 items-center justify-between">
                <p class="font-semibold">Total Pesanan</p>
                <p class="font-semibold" x-text="'Rp' + overallTotalPrice()"></p>
            </div>

            <div class="pt-5">
                <x-input-label for="payment" value="Metode pembayaran" />
                <x-select-input id="payment" class="block mt-1 w-full" name="payment" x-model="payment"
                    :items="[
                        [
                            'value' => 'cod',
                            'name' => 'COD',
                        ],
                        [
                            'value' => 'transfer',
                            'name' => 'Transfer Bank NTB (xxxxxxx - Madrasah Alam Sayang Ibu)',
                        ],
                        [
                            'value' => 'e-wallet',
                            'name' => 'E-Wallet xxx (0873xxxx - Madrasah Alam Sayang Ibu)',
                        ],
                    ]" required />
            </div>

            <div x-cloak x-show="payment != 'cod'">
                <p x-show="errors.image" class="text-red-500 text-sm" x-text="errors.image"></p>

                @if ($image)
                <div class="bg-gray-200 rounded-t-md overflow-hidden">
                    <img class="mx-auto h-40 object-contain" src="{{ $image->temporaryUrl() }}">
                </div>
                @endif
                <p class="text-gray-400" wire:loading wire:target="image">Sedang upload...</p>
                <div class="relative h-10 border border-gray-300">
                    <input id="image" name="image" type="file" accept="image/*" wire:model="image"
                        class="z-20 absolute inset-0 opacity-0 size-full" :required="payment != 'cod'">

                    <div class="absolute size-full flex items-center justify-center">
                        <p class="text-gray-700 font-medium">Pilih gambar @if ($image)
                            lain
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <p class="text-sm">Pengiriman luar mataram <a href="http://wa.me"
                    class="font-medium text-myaccent underline" target="_blank">Konfirmasi Admin</a></p>

            <div class="pt-5">
                <button type="button" @click="showModal = true"
                    class="px-5 py-2 w-full text-white bg-myaccent hover:bg-myaccenthover font-medium tracking-[0.5px] rounded-md">Buat
                    Pesanan Sekarang
                </button>
            </div>
        </div>
    </form>

    <!-- Confirmation Modal -->
    <div x-cloak x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="w-full max-w-sm bg-white p-5 rounded-lg">
            <h3 class="text-lg font-semibold">Konfirmasi Pesanan</h3>
            <p>Yakin melakukan pemesanan?</p>
            <div class="flex gap-2 mt-4 justify-end">
                <button @click="confirmAndSubmit()" class="px-4 py-2 bg-myaccent text-white rounded">Konfirmasi</button>
                <button @click="showModal = false" class="px-4 py-2 bg-gray-500 text-white rounded">Batal</button>
            </div>
        </div>
    </div>
</section>