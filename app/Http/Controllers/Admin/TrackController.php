<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Track;
use App\Photo;

use Illuminate\Support\Facades\DB;

class TrackController extends Controller
{

    public function index()
    {
        $tracks = Track::orderBy('id', 'desc')->paginate(10);
        return view('admin.tracks.index', compact('tracks'));
    }

    public function create()
    {
        return view('admin.tracks.create');
    }

    public function store(Request $request)
    {
        // Get file name 

        $file = $request->file('filename');

        $filename = $file->getClientOriginalName();

        $file_extension = $file->getClientOriginalExtension();

        $file_to_store = $filename . '_' . time() . '_.' . $file_extension;

        $photo_id = DB::table('photos')->insertGetId(['filename' => $file_to_store]);

        $file->move(public_path('images'), $file_to_store);

        $rules = [
            'name' => 'required|min:4|max:50'
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $data['name'] = $request->name;
        $data['photo_id'] = $photo_id;

        Track::create($data);
        return redirecT('/admin/tracks');
    }

    public function show(Track $track)
    {
        // $track = Track::findOrFail($id);
        return view('admin.tracks.show', compact('track'));
    }

    public function edit(Track $track)
    {
        // $track = Track::findOrFail($id);
        return view('admin.tracks.edit', compact('track'));
    }

    public function update(Request $request,Track $track)
    {

        if($request->has('name')) {
            $track['name'] = $request->name;
        }

        if($request->has('filename')) {

            // delete old photo
            if(file_exists(public_path('images/'.$track->photo->filename))){
                unlink(public_path('images/'.$track->photo->filename));
            }
            // insert a new photo

            $file = $request->file('filename');

            $filename = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();
            $file_to_store = time() . '_' . $filename . '_.' . $file_extension;
            $new_photo_id = DB::table('photos')->insertGetId(['filename' => $file_to_store]);

            $file->move( public_path('images'), $file_to_store );

            // attach photo with track 
            $track['photo_id'] = $new_photo_id;             
        }

        if($track->isClean()) {
            // nothing has changed
        }else {
            $track->save();
            return redirect('/admin/tracks');
        }
    }

    public function destroy(Track $track)
    {
        // $track = Track::findOrFail($id);
        $track->delete();
        
        // delete the image from server
        unlink(public_path('images/' . $track->photo->filename));

        // remove the image from DB
        Photo::destroy($track->photo->id);

        return redirect('/admin/tracks');
    }
}
