<div wire:ignore.self>
    @if ($errors->any() || session('success'))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ( !request()->routeIs('dashboard') )    
        <form wire:ignore.self accept="{{ route('audios.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col items-stretch justify-between gap-4 p-4 mb-4 bg-gray-200 border border-gray-400 rounded-lg lg:flex-row lg:items-end dark:bg-gray-800 lg:gap-0">
            @csrf
            <div class="flex flex-col items-stretch justify-between gap-4 md:flex-row lg:items-end">
                <x-labeled-file label="mp3 Yükle" class="bg-gray-50 dark:bg-gray-800" name="file" accept="audio/mp3"></x-labeled-file>
                <x-labeled-input label="Ad" class="bg-gray-50 dark:bg-gray-800" name="title"></x-labeled-input>
                <div class="flex justify-center">
                    <div class="w-full bg-gray-50 dark:bg-gray-800">
                        <select data-te-select-init multiple name="genres[]">
                            @forelse ($genres as $genre)
                                <option value="{{ $genre }}" {{ in_array($genre, old('genres', [])) ? 'selected' : '' }}><span class="capitalize">{{ $genre }}</span></option>
                            @empty
                                <option value="">Hiçbir etiket bulunamadı</option>
                            @endforelse
                        </select>
                        <label data-te-select-label-ref>Etiketler</label>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
            <button type="submit"
                class="inline-block rounded-lg bg-success px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]"
                data-te-ripple-init data-te-ripple-color="light">
                Ses Ekle
            </button>
        </form>
    @endif
    <div>
        @include('livewire.includes.audiosTable')
    </div>
</div>
