<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PodcastController extends Controller
{
    
    public function user_index()
    {
        return Podcast::where('users_id',auth()->user()->id)->get();
    }
    public function admin_index()
    {
        return Podcast::withTrashed()->get();
    }

   
    public function create()
    {
        return view('podcast.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombrePodcast' => 'required|max:255',
            'descripcionPodcast'=>'required',
            'portadaPodCast' => 'required|mimes:jpg,bmp,png',
            'audioPodCast'=>'required|mimes:mp3'
        ]);   
        $filePortada = $request->file('portadaPodCast');
        $nombrePortada =  time()."_".$filePortada->getClientOriginalName();
        Storage::disk('public')->put($nombrePortada,  File::get($filePortada));

        $fileAudio = $request->file('audioPodCast');
        $nombreAudio =  time()."_".$fileAudio->getClientOriginalName();
        Storage::disk('local')->put($nombreAudio,  File::get($fileAudio));

        //Creamos el registro
        $podcast = new Podcast;
        $podcast->name= $request->nombrePodcast;
        $podcast->detail = $request->descripcionPodcast;
        $podcast->podcasts_url = $nombreAudio;
        $podcast->caratula_url = $nombrePortada;
        $podcast->users_id = auth()->user()->id;
        $podcast->save();
        return back();
        
    }
    public function descargar(Podcast $podcast)
    {
        if (Storage::exists($podcast->podcasts_url)) {
            return Storage::download($podcast->podcasts_url);
        }   
    }
    public function show(Podcast $podcast)
    {
        //
    }

    
    public function edit(Podcast $podcast)
    {
        //
    }

   
    public function update(Request $request, Podcast $podcast)
    {
        //
    }

   
    public function destroy(Podcast $podcast)
    {
        //
    }
}
