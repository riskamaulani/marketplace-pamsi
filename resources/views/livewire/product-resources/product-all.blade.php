<div>
    <div class="grid gap-4 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
        @forelse ($products as $product)
            <a href="{{ route('product.detail', $product['id']) }}">
                <div class="max-w-[300px] h-full border shadow-md rounded-md overflow-hidden">
                    <img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}"
                        class="w-full aspect-square object-cover object-center">
                    <div class="py-2 px-3">
                        <p class="text-[13px] line-clamp-2">{{ $product['name'] }}</p>
                        <p class="text-[15px] font-bold">Rp{{ $product['price'] }}</p>
                        <div class="flex gap-1 items-center">
                            @if (!is_null($product['ratings']))
                                <div class="flex items-center">
                                    <svg class="size-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049.297l2.9 5.883 6.528.947-4.724 4.606 1.114 6.49L10 14.347l-5.867 3.086 1.114-6.49L.523 7.127l6.528-.947L9.049.297z" />
                                    </svg>
                                    <span class="text-[12px] text-[#6d7588]">{{ $product['ratings'] }}</span>
                                </div>
                            @endif
                            <span
                                class="text-[12px] text-[#6d7588]">{{ !is_null($product['ratings']) && $product['sold'] != 0 ? '|' : '' }}</span>
                            <span
                                class="text-[12px] text-[#6d7588]">{{ $product['sold'] != 0 ? $product['sold'] . ' terjual' : '' }}</span>
                        </div>
                    </div>
                </div>
                
            </a>
        @empty
            <p
                class="text-center text-gray-600 font-medium col-span-2 sm:col-span-3 md:col-span-4 lg:col-span-5 xl:col-span-6">
                Produk Tidak Ditemukan
            </p>
        @endforelse
    </div>

    @if ($hasMore)
        <div class="flex justify-center mt-4">
            <button wire:click="loadProducts"
                class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring">
                Lainnya
            </button>
        </div>
    @endif
</div>
