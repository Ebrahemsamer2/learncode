<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Course;
use App\Track;
use App\Photo;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withTrashed()->orderBy('id', 'desc')->paginate(15);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {   
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'track_id' => 'required|integer',
            'photo_id' => 'required',
        ];

        $this->validate($request, $rules);
        
        $data = $request->all();

        if($request->has('photo_id')) {

            $file = $request->file('photo_id');

            $filename = $file->getClientOriginalName();

            $file_extension = $file->getClientOriginalExtension();

            $file_to_store = time() . '_' . $filename . '_.' . $file_extension;

            $photo_id = DB::table('photos')->insertGetId(['filename' => $file_to_store]);

            $file->move(public_path('/images'), $file_to_store);

            $data['photo_id'] = $photo_id;
        }

        Course::create($data);
        Session::flash('created_course', $data['title'] . ' Course has created');
        return redirect('/admin/courses');
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course')); 
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));        
    }

    public function update(Request $request, Course $course)
    {

        if($request->has('title')) {
            $course->title = $request->title;
        }
        if($request->has('description')) {
            $course->description = $request->description;
        }
        if($request->has('track_id')) {
            $course->track_id = $request->track_id;
        }
        if($request->has('photo_id')) {
            
            // Delete Old Photo
            if(file_exists(public_path('/images/') . $course->photo->filename)) {
                unlink(public_path('/images/') . $course->photo->filename);
            }

            $file = $request->file('photo_id');

            $filename = $file->getClientOriginalName();

            $file_extension = $file->getClientOriginalExtension();

            $file_to_store = time() . '_' . $filename . '_.' . $file_extension;

            $photo_id = DB::table('photos')->insertGetId(['filename' => $file_to_store]);

            $file->move(public_path('/images'), $file_to_store);

            $course->photo_id = $photo_id;

        }

        if($course->isClean()) {
            Session::flash('nothing_changed', $course->title . ' Course has not changed');
            return redirect('/admin/courses/');
        }
        
        $course->save();
        Session::flash('updated_course', $course->title . ' Course has updated');
        return redirect('/admin/courses/');
    }
    
    public function destroy(Course $course)
    {
        $course->delete();
        Session::flash('deleted_course', $course->title . ' Course has Deleted');
        return redirect('/admin/courses');
    }
}
