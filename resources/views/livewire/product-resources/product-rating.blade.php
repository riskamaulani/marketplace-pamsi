<div x-data="{ data: @entangle('data'), error: @entangle('error'), products: null }" @give-rating.window="products = $event.detail.products">
    <p class="font-semibold">Beri Ulasan <span x-show="error" class="text-red-500 text-[12px]">(Rating tidak
            dipilih!)</span></p>

    <div class="space-y-2">
        <template x-for="(product, index) in products" :key="product.id">
            <div class="pt-2 space-y-2 border-t">
                <div class="flex gap-2 items-center justify-between">
                    <div class="flex gap-2">
                        <img :src="`{{ asset('') }}${product.image}`" alt="Produk"
                            class="h-12 object-cover object-center aspect-square rounded-sm">

                        <div>
                            <p class="text-sm font-semibold line-clamp-2" x-text="product.name"></p>
                            <p class="text-[12px]">Rp<span x-text="product.price"></span></p>
                        </div>

                    </div>

                    <p>x <span class="text-xl font-semibold" x-text="product.quantity"></span></p>
                </div>

                <div>
                    <div x-data="{
                        rating: 0,
                        maxRating: 5,
                        setRating(star) {
                            this.rating = star;
                            data[index].rating = star;
                        }
                    }" @give-rating.window="rating = 0"
                        class="flex gap-2 items-center justify-center">
                        <template x-for="star in maxRating">
                            <svg @click="setRating(star)"
                                x-bind:class="{ 'text-yellow-400': star <= rating, 'text-gray-300': star > rating }"
                                class="size-5 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049.297l2.9 5.883 6.528.947-4.724 4.606 1.114 6.49L10 14.347l-5.867 3.086 1.114-6.49L.523 7.127l6.528-.947L9.049.297z" />
                            </svg>
                        </template>
                    </div>

                    <x-text-area x-model="data[index].comment" class="block mt-1 w-full text-sm"
                        placeholder="Ulasan produk (opsional)"></x-text-area>
                </div>
            </div>
        </template>
    </div>

    <x-primary-button wire:click="submitRatings" class="mt-5 py- w-full justify-center"><span
            class="text-sm text-white font-semibold">Simpan</span></x-primary-button>
</div>
