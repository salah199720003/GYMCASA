<?php

namespace App\Http\Controllers;

use App\Models\video;
use Illuminate\Http\Request;

class videocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos=video::all();
        return view('admin',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('videocreate');
    }
    public function store(Request $request){
        $request->validate([
            'video' => 'required|file|max:15480|mimes:mp4,mov,avi,wmv',
            'image' => 'required|file|image',
            'titre'=>'required',
            'description'=>'required'

        ], [
            'video.mimes' => 'format invalide. Allowed formats: mp4, mov, avi, wmv',
            'video.required' => 'un video est necessaire pour uploader',
            'video.max'=>'votre video est trop volumineux ne depassez pas 15mb',
            'image.image'=>'svp uploader une image pour la mignature',
            'image.required'=>'une mignature est necessaire pour uploader',
            'titre.required'=>'un titre est necessaire',
            'description.required'=>'une description est necessaire'
        ]);
            $values=$request->all();
            $video=$request->file('video');
            $image=$request->file('image');
            $destination='laravel/public/videos/';
            $profilevideo=date("Ymdhis").".".$video->getClientOriginalExtension();
            $video->move($destination,$profilevideo);
            $values['video']=$profilevideo;
            $profileimage=date("Ymdhis").".".$image->getClientOriginalExtension();
            $image->move('laravel/public/img/',$profileimage);
            $values['image']=$profileimage;
            
        video::create($values);
        return redirect()->route('video.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(video $video)
    {
        //
    }
}
