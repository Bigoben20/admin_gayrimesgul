<div wire:ignore.self>
    <div class="p-4 mb-4 flex justify-between items-end bg-gray-200 dark:bg-gray-800 border border-gray-400 rounded-lg">
        <div class="flex justify-between items-end gap-4">
            <x-labeled-file label="mp3 Yükle" class="bg-gray-50 w-full dark:bg-gray-800" wire:model.defer="mp3.file_path" accept="audio/*"></x-labeled-file>
            <x-labeled-input label="Ad" class="w-full bg-gray-50 dark:bg-gray-800" wire:model.defer="mp3.title"></x-labeled-input>
            <div class="flex justify-center">
                <div class="w-full xl:w-96 bg-gray-50 dark:bg-gray-800">
                    <select data-te-select-init multiple wire:model.defer="mp3.genres">
                        @forelse ($genres as $genre)
                            <option value="{{ $genre }}"><span class="capitalize">{{ $genre }}</span></option>
                        @empty
                            <option value="">Hiçbir etiket bulunamadı</option>
                        @endforelse
                    </select>
                    <label data-te-select-label-ref>Etiketler</label>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button"
            class="inline-block rounded-lg bg-success px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]" wire:click="store"
            data-te-ripple-init data-te-ripple-color="light">
            Ses Ekle
        </button>
    </div>
    <div>
        @include('livewire.includes.audiosTable')
    </div>
</div>
