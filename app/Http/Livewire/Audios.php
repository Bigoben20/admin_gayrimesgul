<?php

namespace App\Http\Livewire;

use App\Models\Audio;
use Livewire\Component;

class Audios extends Component
{
    public $genres = [
        'aksiyon'
    ];

    public $mp3 = [
        'title' => '',
        'file_path' => '',
        'genres' => []
    ];
    
    public function store()
    {
        // Validate form input
        $this->validate([
            'mp3.title' => 'required',
            'mp3.file_path' => 'required|mimes:mp3|max:2048',
        ]);

        // Save file to storage
        $file_path = $this->mp3['file_path']->store('mp3s', 'public');

        // Create new Mp3 model in database
        $mp3 = new Audio();
        $mp3->name = $this->mp3['title'];
        $mp3->filepath = $file_path;
        $mp3->genres = $this->mp3['genres'];
        $mp3->save();

        // Reset form input
        $this->mp3 = [
            'title' => '',
            'file_path' => '',
        ];

        // Flash success message to session
        session()->flash('success', 'MP3 Başarıyla kaydedildi.');
    }



    public function render()
    {
        return view('livewire.audios');
    }
}
