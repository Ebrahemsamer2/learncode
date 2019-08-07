<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Track;

class TracksController extends Controller
{

    public function index()
    {
        $tracks = Track::paginate(10);
        return view('admin.tracks.index', compact('tracks'));
    }

    public function create()
    {
        return view('admin.tracks.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        $track = Track::findOrFail($id);
        return view('admin.tracks.edit', compact('track'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $track = Track::findOrFail($id);
        $track->delete();

        return redirect('/admin/tracks');
    }
}
