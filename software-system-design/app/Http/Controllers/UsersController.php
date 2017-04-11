<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class UsersController extends Controller
{
    public function create(Request $request) {
        $this->validate($request, [
            'email' => 'required|unique:users',
            'name' => 'required'
        ]);

        $user = $request->all();
        $user['password']="123";
        User::create($user);

        Session::flash('flash_message', 'User successfully added!');
        return redirect()->back();
    }
    public function update($email, Request $request)
    {    
    $this->validate($request, [
            'name' => 'required'
    ]);
    $user = User::findOrFail($email);
    $input = $request->all();
    $user->fill($input)->save();
    Session::flash('flash_message', 'User successfully updated!');
    return redirect()->action('UsersController@show');
    }
     
    public function delete($email) {
        $u = User::findOrFail($email);

        $u->delete();
        Session::flash('flash_message', 'User successfully deleted!');
        return redirect()->action('UsersController@show');
    }

          public function show(){
            $users = User::all();
            return view('dashboard.users')->with('users', $users);
    }
}
