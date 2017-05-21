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
use App\Chat;
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
		$chat = new Chat();
		$chat->name=$request->name;
		$chat->project_id=$project->id;
		$chat->save();
		$chatUsers =[
		            [
		               'user_id' => $user->id,
			       'chat_id' => $chat->id
		            ]
		        ];
		DB::table('user_chat')->insert($chatUsers);
		// $project = $request->all();
		
		// Project::create($project);
		
		Session::flash('flash_message', 'Project successfully created!');
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

	public function showChat($id) {
		$chatId=DB::table('chats')
		        ->where('project_id', '=', $id)
		        ->select('id')->first();
		$chat = Chat::findOrFail($chatId->id);
		$messages = DB::table('messages')
			->join('chats', 'chats.id', '=', 'chat_id')
			->where('chats.project_id', '=', $id)
			->join('users','messages.user_id', '=', 'users.id')
			->orderBy('messages.id')
			->select('users.name', 'messages.created_at', 'content')
		        ->get();
		$chatId=DB::table('chats')
		        ->where('project_id', '=', $id)
		        ->select('id')->first();
		$users = DB::table('user_chat')
		        ->where('chat_id', '=', $chatId->id)
			->join('users', 'users.id', '=', 'user_id')
		        ->get();
		return view('show.projectChat')
		        ->with('chat', $chat)
		        ->with('users', $users)
			->with('messages', $messages);
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
		$chatId=DB::table('chats')
		        ->where('project_id', '=', $id)
		        ->select('id')->first();
		$chat = DB::table('user_chat')
		        ->where('chat_id', '=', $chatId->id)
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
		$chatId=DB::table('chats')
		        ->where('project_id', '=', $id)
		        ->select('id')->first();	
		DB::table('user_chat')->insert(
		        [   'user_id' => $userId->id,
		            'chat_id' => $chatId->id
		        ]);
		return redirect()->back();
		}
		else {
		   return redirect()->action('HomeController@index');
		}
	}
	
	public function sendMessage(Request $request, $id){
		if($request->message==null)
		       return redirect()->back();
		       
		$message = [
			[            
		                'content' => $request->message,
		                'user_id' => Auth::user()->id,
			        'chat_id' => $id,
		                'created_at' => date("Y-m-d H:i:s")
			]
		];

		DB::table('messages')->insert($message);
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
