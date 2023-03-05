<div wire:ignore.self data-te-modal-init class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="addAudio" tabindex="-1"
    aria-labelledby="addAudioLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-gray-700">
            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="addAudioLabel">
                    Ses Ekle
                </h5>
                <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss
                    aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                <div class="flex flex-col w-full">
                    <x-labeled-input label="Ad" class="w-full dark:bg-gray-800" wire:model.defer="mp3.title"></x-labeled-input>
                    <x-labeled-file label="mp3 Yükle" class="w-full dark:bg-gray-800" wire:model.defer="mp3.file_path" accept="audio/*"></x-labeled-file>
                    <div class="flex justify-center">
                        <div class="mb-3 w-full xl:w-96 dark:bg-gray-800">
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
            </div>
            <div class="flex flex-shrink-0 flex-wrap items-center justify-between rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button type="button"
                    class="ml-1 inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                    Kapat
                </button>
                <button type="button" wire:click="store"
                    class="inline-block rounded bg-success px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                    Kaydet
                </button>
            </div>
        </div>
    </div>
</div>
