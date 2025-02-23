<div class="grid gap-4 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5">
    @foreach ($products as $product)
        <a href="{{ route('product.detail', $product) }}">
            <div class="max-w-[300px] h-full border shadow-md rounded-md overflow-hidden">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-full aspect-square object-cover object-center">
                <div class="py-2 px-3">
                    <p class="text-[13px] line-clamp-2">{{ $product->name }}</p>
                    <p class="text-[15px] font-bold">Rp{{ $product->price }}</p>
                    <div class="flex gap-1 items-center">
                        @if ($product->ratings != null)
                            <div class="flex items-center">
                                <svg class="size-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049.297l2.9 5.883 6.528.947-4.724 4.606 1.114 6.49L10 14.347l-5.867 3.086 1.114-6.49L.523 7.127l6.528-.947L9.049.297z" />
                                </svg>
                                <span class="text-[12px] text-[#6d7588]">{{ $product->ratings }}</span>
                            </div>
                        @endif
                        <span
                            class="text-[12px] text-[#6d7588]">{{ $product->ratings != null && $product->sold != 0 ? '|' : '' }}</span>
                        <span
                            class="text-[12px] text-[#6d7588]">{{ $product->sold != 0 ? $product->sold . ' terjual' : '' }}</span>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
  

</div>

