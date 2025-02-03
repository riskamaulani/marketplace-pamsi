<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Foto Profil
        </h2>
    </header>

    <div class="mt-4">
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

    <x-primary-button class="mt-4" wire:click="save"><span
            class="text-sm text-white font-normal">Simpan</span></x-primary-button>
</section>
