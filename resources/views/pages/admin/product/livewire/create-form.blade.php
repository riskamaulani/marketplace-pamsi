<div>
    <h2 class="font-semibold text-center text-3xl">Tambah Produk</h2>
    <form wire:submit="save" class="mt-4 space-y-4">
        {{-- Image --}}
        <div>
            @if ($image)
                <div class="bg-gray-200 rounded-t-md overflow-hidden">
                    <img class="mx-auto h-40 object-contain" src="{{ $image->temporaryUrl() }}">
                </div>
            @endif
            <p class="text-gray-400" wire:loading wire:target="image">Sedang upload...</p>
            <div class="relative h-10 border border-gray-300">
                <input id="image" name="image" type="file" accept="image/*" wire:model="image"
                    class="z-10 absolute inset-0 opacity-0 size-full cursor-pointer" required>

                <div class="absolute size-full flex items-center justify-center">
                    <p class="text-gray-700 font-medium">Pilih gambar @if ($image)
                            lain
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" value="Nama" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                required autofocus autocomplete="name" />
        </div>

        <!-- Price -->
        <div>
            <x-input-label for="price" value="Harga" />
            <x-text-input wire:model="price" id="price" min='1' class="block mt-1 w-full" type="number"
                name="price" required />
        </div>


        <!-- Description -->
        <div>
            <x-input-label for="description" value="Deskripsi" />
            <x-text-area wire:model="description" id="description" class="block mt-1 w-full"
                name="description"></x-text-area>
        </div>

        {{-- Kategori --}}
        <div>
            <x-input-label for="category_id" value="Kategori" />
            <x-select-input id="category_id" class="block mt-1 w-full" name="category_id" wire:model="category_id"
                :items="array_map(function ($category) {
                    return ['value' => $category['id'], 'name' => $category['name']];
                }, $categories)" />
        </div>

        <div x-data="{ order: 'in-stock' }" class="space-y-4">
            {{-- Order Type --}}
            <div>
                <x-input-label for="order_type" value="Jenis Pemesanan" />
                <x-select-input id="status" class="block mt-1 w-full" name="status" x-model="order"
                    wire:model="order_type" :items="[
                        ['value' => 'in-stock', 'name' => 'Ready Stok'],
                        ['value' => 'pre-order', 'name' => 'Pre-Order'],
                    ]" required />
            </div>

            <!-- Stock -->
            <div x-show="order == 'in-stock'">
                <x-input-label for="stock" value="Stok" />
                <x-text-input wire:model="stock" id="stock" min='0' class="block mt-1 w-full" type="number"
                    name="stock" required />
            </div>

            {{-- Status --}}
            <div x-cloak x-show="order != 'in-stock'">
                <x-input-label for="status" value="Status" />
                <x-select-input id="status" class="block mt-1 w-full" name="status" wire:model="status"
                    :items="[['value' => 'ready', 'name' => 'Tersedia'], ['value' => 'sold', 'name' => 'Habis']]" selected="ready" required />
            </div>
        </div>

        <x-primary-button class="w-full justify-center"><span
                class="text-base text-white font-normal">Simpan</span></x-primary-button>
    </form>
</div>
