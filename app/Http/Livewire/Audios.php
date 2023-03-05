<?php

namespace App\Http\Livewire;

use App\Models\Audio;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Audios extends Component
{
    use LivewireAlert;

    use WithFileUploads;

    public $allAudios;
    public $selectedAudio;

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
        'file_path' => '',
        'genres' => []
    ];
    
    protected $rules = [
        'mp3.title' => 'required',
        'mp3.file_path' => 'required|mimes:mp3|max:2048'
    ];
 
    protected $messages = [
        'mp3.title.required' => 'Ad boş bırakılamaz.',
        'mp3.file_path.required' => 'Lütfen dosya seçiniz',
        'mp3.file_path.max.2048' => 'Dosya max 2MB olabilir',
        'mp3.file_path.max.mimes' => 'Sadece mp3 formatında olabilir',
    ];

    public function store()
    {
        // Validate form input
        $this->validate();
        session()->flash('error', 'error');

        // Save file to storage
        $file_path = $this->mp3['file_path']->storePubliclyAs('audios', Auth::id().' '.$this->mp3['title'].'.mp3');

        // Create new Mp3 model in database
        $audio = new Audio();
        $audio->name = $this->mp3['title'];
        $audio->filepath = $file_path;
        $audio->genres = $this->mp3['genres'];
        $audio->save();

        
        // Flash success message to session
        $this->alert('success', 'MP3 dosyası başarıyla kaydedildi');
        
        // Reset form input
        $this->mp3 = [
            'title' => '',
            'file_path' => '',
            'genres' => []
        ];
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
