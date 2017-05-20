<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;

class UsersController extends Controller
{
	public function create(Request $request) {
		if(Auth::check()) {
		$this->validate($request, [
		            'email' => 'required|email|unique:users',
		            'name' => 'required'
		        ]);
		$role = 1;
		$user = new User;
		$name = $request->name;
		$email = $request->email;
		$password =  Hash::make($request->password);
		User::create(array(
			'name' => $name,
			'email' => $email,
			'password' => $password,
			'role' => $role
		));
		
		Session::flash('flash_message', 'User successfully added!');
		return redirect()->back();
				}
		else {
			return redirect()->action('HomeController@index');
		}
	}
	public function update($email, Request $request) {
		if(Auth::check()) {
		$this->validate($request, [
		            'name' => 'required'
		    ]);
		$user = User::findOrFail($email);
		$input = $request->all();
		$user->fill($input)->save();
		Session::flash('flash_message', 'User successfully updated!');
		return redirect()->action('UsersController@show');
				}
		else {
			return redirect()->action('HomeController@index');
		}
	}
	
	public function delete($email) {
		if(Auth::check()) {
		$u = User::findOrFail($email);
		
		$u->delete();
		Session::flash('flash_message', 'User successfully deleted!');
		return redirect()->action('UsersController@show');
				}
		else {
			return redirect()->action('HomeController@index');
		}
	}
	
	public function show(){
		if(Auth::check()) {
		$users = User::all();
		return view('dashboard.users')->with('users', $users);
				}
		else {
			return redirect()->action('HomeController@index');
		}
	}
}
