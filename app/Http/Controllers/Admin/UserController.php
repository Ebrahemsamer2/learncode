<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


use App\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $rules = [
            'name'  => 'min:6|max:20',
            'email' => 'unique:users,email,'.$user->id,
        ];

        if($request->has('email') && $request->email != $user->email) {
            $user['email'] = $request->email;
        }

        if($request->has('name')) {
            $user['name'] = $request->name;
        }

        if(! $user->isDirty()) {
            Session::flash('nothing_changed', $user->name . ' has not changed');
            return redirect('/admin/users');
        }else {
            $user->save();
            Session::flash('updated_user', $user->name . ' has updated');
            return redirect('/admin/users');
        }

    }

    public function show(User $user) {
        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
       $user->delete();
       Session::flash('deleted_user', $user->name . ' has deleted');
       return redirect('/admin/users');
    }
}
