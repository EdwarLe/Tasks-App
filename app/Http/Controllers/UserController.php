<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index () {
        $users = User::all();
        return view('admin.users.index')->with(compact('users'));
    }

    public function edit ($id) {

        $user = User::find($id);
        return view('admin.users.edit')->with(compact('user'));
    }

    public function store (Request $request) {

        $rules = [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];

        $messages = [
            'name.required' => 'The user name is required',
            'name.max' => 'The name is too long',
            'name.min' => 'The name must be at lest 3 characters',
            'email.required' => 'The email is required',
            'email.email' => 'The email entered is not valid',
            'email.max' => 'The name is too long',
            'email.unique' => 'This email is already in use',
            'password.required' => 'The password is required',
            'password.min' => 'The password must be at lest 8 characters'
        ];

        $this->validate($request, $rules, $messages);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = 1;
        $user->save();

        return back()->with('notification', 'Successfully registered user');
    }

    public function update ($id, Request $request) {

        $rules = [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['string', 'email', 'max:255'],
            'password' => 'min:8'
        ];
        $messages = [
            'name.required' => 'The user name is required',
            'name.max' => 'The name is too long',
            'name.min' => 'The name must be at lest 3 characters',
            'email.email' => 'The email entered is not valid',
            'email.max' => 'The name is too long',
            'password.min' => 'The password must be at lest 8 characters'
        ];
        
        $this->validate($request, $rules, $messages);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $password = $request->input('password');
        if ($password)
            $user->password = bcrypt($password);

        $user->save();

        return back()->with('notification', 'Succesfully updated user');
    }

    public function delete ($id) {

        $user = User::find($id);
        $user->delete();

        return back()->with('notification', 'Succesfully deleted user');

    }

}
