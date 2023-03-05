<div class="flex flex-col gap-4 bg-gray-200 dark:bg-gray-800 border border-gray-400 dark:border-gray-600 rounded-lg">
    <div class="grid grid-cols-5 border-b border-gray-400 dark:border-gray-600 rounded-t-lg px-4 py-2 bg-gray-300 dark:bg-gray-600 dark:text-gray-200">
        <div class="col-span-1">
            No
        </div>
        <div class="col-span-3">
            Ad
        </div>
        <div class="col-span-1">
            Eylem
        </div>
    </div>

    <div class="flex flex-col items-start px-4 pb-4">
        <div class="grid grid-cols-5 w-full">
            {{-- Pills --}}
            <div class="flex justify-start items-center gap-4 bg-amber-500 hover:bg-amber-600 active:bg-amber-700 rounded-full shadow-md px-4 py-2 cursor-pointer col-span-4 w-[90%] md:w-[50%]" data-te-ripple-init data-te-ripple-color="light">
                <div class="px-4">
                    1
                </div>
                <div>
                    <div class="text-sm">
                        Ses efekti
                    </div>
                    <div class="text-xs">
                        Aksiyon
                    </div>
                </div>
            </div>
            <div class="col-span-1 flex items-center justify-start">
                <button class="flex justify-between items-center gap-2 rounded-lg bg-danger px-4 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)]" data-te-toggle="modal" data-te-target="#deleteAudio" data-te-ripple-init data-te-ripple-color="light">
                    <i class="fa-solid fa-trash"></i> Sil
                </button>
                @include('livewire.modals.deleteAudio')
            </div>
        </div>
    </div>
</div>
