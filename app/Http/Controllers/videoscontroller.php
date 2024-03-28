<?php

namespace App\Http\Controllers;

use App\Models\video;
use App\Models\commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Add this line to import File facade
use App\Models\User;

class videoscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $video = video::latest()->paginate(12);

        return view('programs', compact('video'))->with('i', (request()->input('page', 1) - 1) * 12);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(video $video)
    {
        $a = $video->id;
        $comments = commentaire::where('video_id', '=', $a)->get();
        $altvideo = Video::where('id', '!=', $a)->inRandomOrder()->limit(6)->get();

        return view('showvideo', compact('video'))->with('altvideo', $altvideo)->with('comments', $comments);
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
    public function destroy(video $adminvideo)
    {
        // Delete the video file from the server
        $videoPath = public_path('videos/' . $adminvideo->video);
        if (File::exists($videoPath)) {
            File::delete($videoPath);
        }
    
        // Delete the image file from the server
        $imagePath = public_path('img/' . $adminvideo->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    
        // Delete the video record from the database
        $adminvideo->delete();
    
        return redirect()->route('adminvideo.index')->with('success', 'Video deleted successfully');
    }
}
