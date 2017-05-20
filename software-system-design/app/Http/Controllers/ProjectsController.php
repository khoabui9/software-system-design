<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\UserProject;
use App\Task;
use App\Card;
use App\User;


use Session;

class ProjectsController extends Controller
{
	public function show(){
		$user = Auth::user();
		$id = Auth::id();
		if(Auth::check()) {
		$role = $user->role;
		if ($role == 2) {
		 $projects = Project::all();
		 return view('dashboard.projectsadmin')->with('projects', $projects);
		}
		else {
		$query =  DB::table('user_project')
		->select('projects.*')
		->where('user_id', '=', $id)
		->join('projects', 'projects.id', '=', 'user_project.project_id');
		$projects = $query->get();
		return view('dashboard.projects')->with('projects', $projects);
		}
		}
		else {
		   return redirect()->action('HomeController@index');
		}
	}
	public function delete($id) {
		if(Auth::check()) {
		$p = Project::findOrFail($id);
		
		$p->delete();
		
		return redirect()->action('ProjectsController@show');
		}
		else {
		   return redirect()->action('HomeController@index');
		}
	}
	
	public function create(Request $request) {
		if(Auth::check()) {
		$user = Auth::user();
		$this->validate($request, [
		            'name' => 'required|unique:projects',
		            'description' => 'required'
		]);
		$project = new Project();
		$project->name = $request->name;
		$project->description = $request->description;
		$project->save();
		
	 	$project->user()->save($user); 
		// $project = $request->all();
		
		// Project::create($project);
		
		Session::flash('flash_message', 'Task successfully added!');
		return redirect()->action('ProjectsController@show');
		}
		else {
		   return redirect()->action('HomeController@index');
		}
	}
	public function update(Request $request, $id) {
		if(Auth::check()) {
		$p = Project::findOrFail($id);
		$input = $request->all();
		$p->fill($input)->save();
		Session::flash('flash_message', 'Project successfully updated!');
		return redirect()->back();
		}
		else {
		   return redirect()->action('HomeController@index');
		}
	}
	public function showOne($id) {
		if(Auth::check()) {
		$project = Project::findOrFail($id);
		$users = DB::table('user_project')
		        ->where('project_id', '=', $id)
		        ->join('users', 'users.id', '=', 'user_id')
		        ->select('users.*')
		        ->get();
		$allUsers = DB::table('users')
		        ->get();
		$ids1 = $allUsers->pluck('id');
		$ids2 = $users->pluck('id');
		$restUsers = DB::table('users')->whereIn('id',$ids1)->whereNotIn('id',$ids2)->get();
		$taskss = DB::table('tasks')
			 ->where('project_id', '=', $id)
			 ->get();	
		return view('show.project')->withProject($project)
		        ->with('users', $users)
		        ->with('restUsers', $restUsers)
				->with('taskss',$taskss);
		}
		else {
		   return redirect()->action('HomeController@index');
		}
	}
	
	
	public function showEdit($id) {
		if(Auth::check()) {
		$project = Project::findOrFail($id);
		$users = DB::table('user_project')
		        ->where('project_id', '=', $id)
		        ->join('users', 'users.id', '=', 'user_id')
		        ->select('users.*')
		        ->get();
		$allUsers = DB::table('users')
		        ->get();
		$ids1 = $allUsers->pluck('id');
		$ids2 = $users->pluck('id');
		$restUsers = DB::table('users')->whereIn('id',$ids1)->whereNotIn('id',$ids2)->get();
		return view('show.projectEdit')->withProject($project)
		        ->with('users', $users)
			->with('restUsers', $restUsers);
			}
		else {
		   return redirect()->action('HomeController@index');
		}
	}
	
	public function removeUser($id, $email) {
		if(Auth::check()) {
		$userId=DB::table('users')
		        ->where('email', '=', $email)
		        ->select('id')
		        ->first();
		$user = DB::table('user_project')
		        ->where('project_id', '=', $id)
		        ->where('user_id', '=', $userId->id)
		        ->delete();
		return redirect()->back();
		}
		else {
		   return redirect()->action('HomeController@index');
		}
	}
	public function addUser(Request $request, $id) {

		if(Auth::check()) {
		if($request->addUser==null)
		                return redirect()->back();
		$this->validate($request, [
		            'addUser' => 'required'
		        ]);
		$userId=DB::table('users')
		        ->where('email', '=', $request->addUser)
		        ->select('id')->first();
		DB::table('user_project')->insert(
		        [   'user_id' => $userId->id,
		            'project_id' => $id
		        ]);
		return redirect()->back();
		}
		else {
		   return redirect()->action('HomeController@index');
		}
	}
	
	public function sort() {
		// $sortby = Input::get('sortby');
		// if ($sortby == 'date')
		//             $projects =  DB::table('projects')->orderBy('created_at','desc')->paginate(9);
		// else if ($sortby == 'name')
		//             $projects = DB::table('projects')->orderBy('name','asc')->paginate(9);
		// else if ($sortby == 'default')
		//             $projects =  DB::table('projects')->paginate(9);
		
		// return view('dashboard.projects')->with('projects', $projects);
		//return response(view('dashboard.projects',array('projects'=>$projects)),200, ['Content-Type' => 'application/json']);
	}	
}
