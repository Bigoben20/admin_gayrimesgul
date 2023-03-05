<div wire:ignore.self>
    <div class="mb-4">
        <!-- Button trigger modal -->
        <button type="button"
        class="inline-block rounded-lg bg-success px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]"
        data-te-toggle="modal" data-te-target="#addAudio" data-te-ripple-init data-te-ripple-color="light">
            Ses Ekle
        </button>

        <!-- Modal -->
        @include('livewire.modals.addAudio')
    </div>
    <div>
        @include('livewire.includes.audiosTable')
    </div>
</div>
