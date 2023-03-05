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

    <div class="flex flex-col items-start px-4 pb-4 gap-4">
        @forelse ($allAudios as $audio)
            <div class="grid grid-cols-5 w-full">
                {{-- Pills --}}
                <div class="flex justify-start items-center gap-4 bg-amber-500 hover:bg-amber-600 active:bg-amber-700 rounded-full shadow-md px-4 py-2 cursor-pointer col-span-4 w-[90%] md:w-[50%]"
                    data-te-ripple-init data-te-ripple-color="light">
                    <div class="flex justify-center items-center w-12 h-12 text-3xl rounded-full bg-gray-700/20">
                        {{ $audio->id }}
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="text-base capitalize">
                            {{ $audio->name }}
                        </div>
                        <div class="flex gap-1">
                            @forelse ($audio->genres as $genre)
                                <div class="text-xs px-2 p-1 rounded-full bg-gray-700/20">
                                    {{ $genre }}
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>
                </div>
                <audio controls>
                    <source src="{{  $audio->filepath }}" type="audio/mp3">
                    Your browser does not support the audio element.
                </audio>
                <div class="col-span-1 flex items-center justify-start">
                    <button
                        class="flex justify-between items-center gap-2 rounded-lg bg-danger px-4 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)]" wire:click="select({{ $audio->id }})"
                        data-te-toggle="modal" data-te-target="#deleteAudio" data-te-ripple-init data-te-ripple-color="light">
                        <i class="fa-solid fa-trash"></i> Sil
                    </button>
                    @include('livewire.modals.deleteAudio')
                </div>
            </div>
        @empty
            <div class="flex justify-center items-center text-2xl dark:text-white font-bold w-full">
                Hiçbir Ses Dosyası Yüklenmedi
            </div>
        @endforelse
    </div>
</div>
