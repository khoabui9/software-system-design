<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\Task;

class MainController extends Controller
{
	public function index(){
		$user = Auth::user();
		$id = Auth::id();
		if(Auth::check()) {
			$projects =  DB::table('user_project')
				->select('projects.*')
		        ->where('user_id', '=', $id)
		        ->join('projects', 'projects.id', '=', 'user_project.project_id')
				->get();
			$tasks =  DB::table('user_task')
				->select('tasks.*')
		        ->where('user_id', '=', $id)
		        ->join('tasks', 'tasks.id', '=', 'user_task.task_id')
				->get();
			return view('dashboard.dashboard')
		            ->with('projects', $projects)
		            ->with('tasks', $tasks);
		}
		else {
			return redirect()->action('HomeController@index');
		}
		// $projects = Project::all();
		// $tasks = Task::all();
		// return view('dashboard.dashboard')
		//             ->with('projects', $projects)
		//             ->with('tasks', $tasks);
	}
}
