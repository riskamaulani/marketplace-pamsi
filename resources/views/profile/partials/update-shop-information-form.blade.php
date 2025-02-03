<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Informasi Toko
        </h2>
    </header>

    <form method="post" action="{{ route('shop.update', $shop) }}" class="space-y-4">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Nama Toko" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $shop->name)" required
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="description" value="Deskripsi" />
            <x-text-area rows="4" id="description" name="description" class="mt-1 block w-full"
                required>{!! old('description', $shop->description) !!}</x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div x-data="{
            openSchedule: {{ $shop->open_schedule }},
            updateOpenSchedule(index) {
                this.openSchedule[index] = this.openSchedule[index] ? 0 : 1;
            }
        }">
            <input type="hidden" name="open_schedule" :value="JSON.stringify(openSchedule)">

            <x-input-label for="open_schedule" value="Jadwal Buka" />
            @php
                $dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            @endphp
            <div class="mt-1 flex gap-x-5 flex-wrap w-full">
                @foreach (json_decode($shop->open_schedule) as $index => $value)
                    <div class="w-20 flex items-center">
                        <input type="checkbox" :value="openSchedule[{{ $index }}]" id="day_{{ $index }}"
                            class="mr-1 rounded-lg" @change="updateOpenSchedule({{ $index }})"
                            @if ($value) checked @endif>
                        <label for="day_{{ $index }}">{{ $dayNames[$index] }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div x-data="{ managers: {{ $shop->manager }}, newManager: '' }">
            <input type="hidden" name="manager" :value="JSON.stringify(managers)">

            <x-input-label for="managers" value="Pengelola" />

            <div class="mt-1 flex gap-1 flex-wrap">
                <template x-for="(item, index) in managers" :key="index">
                    <div class="pl-2 pr-1 w-fit flex gap-1 items-center border border-myaccent rounded-md">
                        <p x-text="item"></p>
                        <svg @click="managers.splice(index, 1)" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor"
                            class="rounded-md fill-white bg-red-600 hover:cursor-pointer" viewBox="0 0 16 16">
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                </template>
            </div>

            <div class="mt-1 flex gap-2 items-center">
                <x-text-input id="new-manager" type="text" class="mt-1 flex-1" x-model="newManager"
                    @keydown.enter.prevent="if(newManager.trim() !== '') { managers.push(newManager.trim()); newManager = ''; }"
                    placeholder="Nama Pengelola" />

                <button type="button"
                    @click="if(newManager.trim() !== '') { managers.push(newManager.trim()); newManager = ''; }"
                    class="bg-blue-500 hover:bg-blue-700 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="size-7 stroke-2 fill-white" viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                </button>
            </div>
        </div>


        <div>
            <x-input-label for="address" value="Alamat Toko" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $shop->address)"
                required autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button><span class="text-sm text-white font-normal">Simpan</span></x-primary-button>
        </div>
    </form>
</section>
