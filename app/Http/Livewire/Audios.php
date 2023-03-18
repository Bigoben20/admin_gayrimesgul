<?php

namespace App\Http\Livewire;

use App\Models\Audio;
use Illuminate\Http\File;
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

    public $genres = [
        'gerilim',
        'aksiyon',
        'laf sokma',
        'hüzünlü',
        'havalı',
        'komik',
    ];

    public $mp3 = [
        'title' => '',
        'file' => '',
        'genres' => []
    ];

    protected $rules = [
        'mp3.title' => 'required',
        'mp3.file' => 'required|mimes:mp3|max:3072'
    ];

    protected $messages = [
        'mp3.title.required' => 'Ad boş bırakılamaz.',
        'mp3.file.required' => 'Lütfen dosya seçiniz',
        'mp3.file.max.2048' => 'Dosya max 2MB olabilir',
        'mp3.file.max.mimes' => 'Sadece mp3 formatında olabilir',
    ];

    public function store()
    {
        // Validate form input
        $this->validate();

        $originalName = $this->mp3['file']->getClientOriginalName();
        $extension = $this->mp3['file']->getClientOriginalExtension();
        $fileName = $this->mp3['title'] . '.' . $extension;

        // Save file to storage
        $file_path = $this->mp3['file']->storePubliclyAs('audios', $fileName, 'public');
        //dd($file_path);

        // Create new Mp3 model in database
        $audio = new Audio();
        $audio->name = $this->mp3['title'];
        $audio->filepath = $file_path;
        $audio->genres = $this->mp3['genres'];
        $audio->save();


        // Flash success message to session
        $this->alert('success', 'MP3 dosyası başarıyla kaydedildi');

        // Reset form input
        $this->mp3['title'] = '';
        $this->mp3['file'] = '';
        $this->mp3['genres'] = [];
        
        return redirect()->route('auidos.show');
    }

    protected $listeners = ['play'];

    public function play($id)
    {
        //dd($id);
        if($this->playing == null){
            $this->emit('setPlaying', $id);
        }
        else if ($this->playing == $id) {
            $this->emit('setStopped', $id);
            $this->emit('setPlaying', $id);

        } else {
            $this->emit('setStopped', $this->playing);
            $this->emit('setPlaying', $id);
        }
        $this->playing = $id;
    }

    public function select($id)
    {
        $this->selectedAudio = Audio::find($id);
    }

    public function delete()
    {
        $this->selectedAudio->delete();
        $this->alert('success', 'MP3 dosyası başarıyla silindi');
    }

    public function render()
    {
        $this->allAudios = Audio::all();
        return view('livewire.audios');
    }
}
