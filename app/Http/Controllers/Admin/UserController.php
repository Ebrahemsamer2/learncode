<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
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
            $user['verified'] = User::UNVERIFIED_USER;
            $user['verification_token'] = User::generateVerificationCode();
        }

        if($request->has('name')) {
            $user['name'] = $request->name;
        }

        if(!$user->isDirty()) {
            dd("Nothing Changed");
        }else {
            $user->save();
            return redirect('/admin/users');
        }

    }

    public function show(User $user) {
        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
       $user->delete();
        return redirect('/admin/users');
    }
}
