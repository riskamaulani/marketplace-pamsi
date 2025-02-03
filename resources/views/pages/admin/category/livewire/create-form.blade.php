<div>
    <h2 class="font-semibold text-center text-3xl">Tambah Kategori</h2>
    <form wire:submit="save" class="mt-4 space-y-4">
        <!-- Name -->
        <div>
            <x-input-label for="name" value="Nama" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required
                autofocus autocomplete="name" />
        </div>

        <x-primary-button class="w-full justify-center"><span
                class="text-base text-white font-normal">Simpan</span></x-primary-button>
    </form>
</div>
