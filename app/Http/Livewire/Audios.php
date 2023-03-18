<?php

namespace App\Http\Livewire;

use App\Models\Audio;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\File;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Audios extends Component
{
    use LivewireAlert;

    use WithFileUploads;

    public $allAudios;
    public $selectedAudio;

    public $playing;
    public $filePath;

    public $genres = [
        'gerilim',
        'aksiyon',
        'laf sokma',
        'hüzünlü',
        'havalı',
        'komik',
    ];

    public $mp3Title;
    public $mp3Genres = [];
    public $mp3File;

    protected $rules = [
        'mp3Title' => 'required',
        'mp3File' => 'required|mimes:mp3|max:3072'
    ];

    protected $messages = [
        'mp3Title.required' => 'Ad boş bırakılamaz.',
        'mp3File.required' => 'Lütfen dosya seçiniz',
        'mp3File.max.2048' => 'Dosya max 2MB olabilir',
        'mp3File.max.mimes' => 'Sadece mp3 formatında olabilir',
    ];

    public function store()
    {
        // Validate form input
        $this->validate();

        $originalName = $this->mp3File->getClientOriginalName();
        $extension = $this->mp3File->getClientOriginalExtension();
        $fileName = $this->mp3Title.".mp3";

        // Save file to storage
        $file_path = Storage::disk('local')->put($fileName,$this->mp3File);
        //dd($file_path);

        // Create new Mp3 model in database
        $audio = new Audio();
        $audio->name = $this->mp3Title;
        $audio->filepath = $file_path;
        $audio->genres = $this->mp3Genres;
        $audio->save();


        // Flash success message to session
        $this->alert('success', 'MP3 dosyası başarıyla kaydedildi');

        // Reset form input
        $this->mp3Title = "";
        $this->mp3Genres = [];
        $this->mp3File = "";

        return redirect()->route('dashboard');
    }

    protected $listeners = ['play'];

    public function play($id)
    {   
        if ($this->playing == null) {
            $this->emit('setPlaying', $id);
        }
        else if($this->playing == $id){
            $this->emit('setStopped', $id);
            $this->emit('setPlaying', $id);
        } 
        else {
            $this->emit('setStopped', $this->playing);
            $this->emit('setPlaying', $id);
        }
        $this->playing = $id;
    }

    public function select($id)
    {
        $this->selectedAudio = Audio::find($id);
        Storage::files('audios');
    }

    public function delete()
    {
        Storage::delete($this->selectedAudio->name);
        $this->selectedAudio->delete();
        $this->alert('success', 'MP3 dosyası başarıyla silindi');
    }

    public function render()
    {
        $this->allAudios = Audio::all();
        return view('livewire.audios');
    }
}
