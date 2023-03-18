<div class="flex flex-col gap-4 bg-gray-200 border border-gray-400 rounded-lg dark:bg-gray-800 dark:border-gray-600">
    <div class="grid grid-cols-5 px-4 py-2 bg-gray-300 border-b border-gray-400 rounded-t-lg dark:border-gray-600 dark:bg-gray-600 dark:text-gray-200">
        <div class="col-span-1">
            No
        </div>
        <div class="col-span-3">
            Ad {{ $playing }}
        </div>
        <div class="col-span-1">
            Eylem
        </div>
    </div>

    <div class="flex flex-col items-start gap-4 px-4 pb-4">
        @forelse ($allAudios as $audio)
            <div class="grid w-full grid-cols-5">
                {{-- Pills --}}
                <div wire:ignore.self  class="flex justify-start items-center gap-4 bg-amber-500 hover:bg-amber-600 active:bg-amber-700 rounded-full shadow-md px-4 py-2 cursor-pointer col-span-4 w-[90%] md:w-[50%]" wire:click="$emit('play', {{ $audio->id }})"
                    data-te-ripple-init data-te-ripple-color="light">
                    <div class="flex items-center justify-center w-12 h-12 text-3xl rounded-full bg-gray-700/20">
                        {{ $audio->id }}
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="text-base capitalize">
                            {{ $audio->name }}
                        </div>
                        <div class="flex gap-1">
                            @forelse ($audio->genres as $genre)
                                <div class="p-1 px-2 text-xs rounded-full bg-gray-700/20">
                                    {{ $genre }}
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>
                </div>
                @php
                  $filepath = Illuminate\Support\Facades\Storage::url($audio->filepath)
                @endphp
                <audio id="player-{{ $audio->id }}" src="{{ asset($audio->filepath) }}"></audio>
                
                <div class="flex items-center justify-start col-span-1">
                    <button
                        class="flex justify-between items-center gap-2 rounded-lg bg-danger px-4 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)]" wire:click.prevent="select({{ $audio->id }})"
                        data-te-toggle="modal" data-te-target="#deleteAudio" data-te-ripple-init data-te-ripple-color="light">
                        <i class="fa-solid fa-trash"></i> Sil
                    </button>
                    @include('livewire.modals.deleteAudio')
                </div>
            </div>
        @empty
            <div class="flex items-center justify-center w-full text-2xl font-bold dark:text-white">
                Hiçbir Ses Dosyası Yüklenmedi
            </div>
        @endforelse
    </div>
</div>
