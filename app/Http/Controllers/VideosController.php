<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Video::paginate();
        return view('admin.video.index');
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.video.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect('/admin/videos');
    }
}
