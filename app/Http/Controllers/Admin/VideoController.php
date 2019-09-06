<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Video;
use App\Course;
use App\Photo;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->get();
        $courses = Course::withTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('admin.videos.index', compact('videos', 'courses'));
    }

    public function addVideo($id) {
        $course = Course::findOrFail($id);
        return view('admin.videos.create', compact('course'));
    }

    public function store(Request $request)
    {
        
        $rules = [
            'title' => 'required|min:10',
            'link' => 'required|min:10',
            'course_id'=>'required|integer',
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        if($file = $request->file('photo_id')) {
            
            $file_name = explode('.', $file->getClientOriginalName())[0];

            $file_extension = $file->getClientOriginalExtension();
            
            $file_to_store = $file_name . '_' . time() . '_.' . $file_extension;

            $photo = Photo::create(['filename' => $file_to_store]);

            $file->move(public_path('images'),$file_to_store);

            $data['photo_id'] = $photo->id;

        }

        Video::create($data);
        Session::flash('created_video', $data['title'] . ' Video has Created');
        return redirect('/admin/videos');
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
     
        $rules = [
            'title' => 'required|min:10',
            'link' => 'required|min:10',
            'course_id'=>'required|integer',
        ];

        $this->validate($request, $rules);

        if($request->has('title')) {
            $video->title = $request->title;
        }

        if($request->has('link')) {
            $video->link = $request->link;
        }

        if($request->has('photo_id')) {
            $file = $request->file('photo_id');

            $file_name = explode('.', $file->getClientOriginalName())[0];

            $file_extension = $file->getClientOriginalExtension();
            
            $file_to_store = $file_name . '_' . time() . '_.' . $file_extension;

            $photo = Photo::create(['filename' => $file_to_store]);

            $file->move(public_path('images'),$file_to_store);

            $video->photo_id = $photo->id;

        }

        if($video->isClean()) {

            Session::flash('nothing_changed', 'Nothing Changed');
            return redirect('/admin/videos/' . $video->id . '/edit');
        }else {
            $video->save();
            Session::flash('updated_video', $video->title . ' Video has updated');
            return redirect('/admin/videos');
        }

    }

    public function destroy(Video $video)
    {
        $video->delete();
        Session::flash('deleted_video', $video->title . ' has Deleted');
        return redirect('/admin/videos');
    }

}
