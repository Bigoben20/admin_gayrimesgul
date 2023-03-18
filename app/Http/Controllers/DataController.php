<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function audios()
    {
        return view('audios');
    }

    public function storeAudio(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:mp3|max:10000',
        ]);
        
        $title = $validatedData['title'];
        $file = $validatedData['file'];

        $path = Storage::putFile('public/audios', $file);

        $mp3 = new Audio;
        $mp3->name = $title;
        $mp3->filepath = $path;
        $mp3->genres = $request->genres;
        $mp3->save();

        return redirect()->route('audios.show')->with('success', 'Dosya başarıyla eklendi');

    }
}
