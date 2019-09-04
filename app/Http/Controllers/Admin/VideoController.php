<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Video;
use App\Course;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->get();
        $courses = Course::withTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('admin.videos.index', compact('videos', 'courses'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        //
    }
    
    public function show(Video $video)
    {
        return view('admin.videos.show', compact('video'));    
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        
    }

    public function destroy(Video $video)
    {
        $video->delete();
        Session::flash('deleted_video', $video->title . ' has Deleted');
        return redirect('/admin/videos');
    }
}
