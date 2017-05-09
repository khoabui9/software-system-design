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


use Session;

class ProjectsController extends Controller
{
	public function show(){
		$user = Auth::user();
		$id = Auth::id();
		if(Auth::check()) {
			$query =  DB::table('user_project')
			->select('projects.*')
		        ->where('user_id', '=', $id)
		        ->join('projects', 'projects.id', '=', 'user_project.project_id');
		        $projects = $query->get();
			return view('dashboard.projects')->with('projects', $projects);
		}
		else {
			return redirect()->action('HomeController@index');
		}
	}
	public function delete($id) {
		$p = Project::findOrFail($id);
		
		$p->delete();
		
		return redirect()->action('ProjectsController@show');
	}
	
	public function create(Request $request) {
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
	public function update(Request $request, $id) {
		$p = Project::findOrFail($id);
		$input = $request->all();
		$p->fill($input)->save();
		Session::flash('flash_message', 'Project successfully updated!');
		return redirect()->back();
	}
	public function showOne($id) {
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
	
	
	public function showEdit($id) {
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

	public function showChat($id) {
		$project = Project::findOrFail($id);
		$messages = DB::table('messages')
			->join('chats', 'chats.id', '=', 'chat_id')
			->where('chats.project_id', '=', $id)
			->orderBy('messages.id')
		        ->get();
		$users = DB::table('user_project')
		        ->where('project_id', '=', $id)
		        ->join('users', 'users.id', '=', 'user_id')
		        ->select('users.*')
		        ->get();
		return view('show.projectChat')->withProject($project)
		        ->with('users', $users)
			->with('messages', $messages);
	}
	
	public function removeUser($id, $email) {
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
	public function addUser(Request $request, $id) {
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
