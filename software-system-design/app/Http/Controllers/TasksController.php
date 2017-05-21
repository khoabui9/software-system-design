<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use App\Project;
use App\UserTask;
use App\Task;
use App\User;
use Session;

class TasksController extends Controller
{
	public function show(){
		$user = Auth::user();
		$id = Auth::id();
		if(Auth::check()) {
			$role = $user->role;
			if ($role != 2) {
			$query =  DB::table('user_task')
			->select('tasks.*')
		        ->where('user_id', '=', $id)
		        ->join('tasks', 'tasks.id', '=', 'user_task.task_id');
		        $tasks = $query->get();
			return view('dashboard.tasks')->with('tasks', $tasks);
			}
			else {
				$tasks = Task::all();
				return view('dashboard.tasksadmin')->with('tasks', $tasks);
			}
		}
		else {
			return redirect()->action('HomeController@index');
		}
		//return view('dashboard.tasks')->with('tasks', $tasks);
	}

	public function showInCalendar(){
			$user = Auth::user();
		$id = Auth::id();
		if(Auth::check()) {
			$role = $user->role;
			if ($role != 2) {
			$query =  DB::table('user_task')
			->select('tasks.*')
		        ->where('user_id', '=', $id)
		        ->join('tasks', 'tasks.id', '=', 'user_task.task_id');
		        $tasks = $query->get();
		return view('show.calendar')->with('tasks', $tasks);
			}
			else {
				$tasks = Task::all();
				return view('show.calendar')->with('tasks', $tasks);
			}
		}
		else {
			return redirect()->action('HomeController@index');
		}
	}
	
	public function showOne($id) {
		$task = Task::findOrFail($id);
		
		//return view('show.project')->withProject($project);
	}
	public function update($id, Request $request)
	{
		if(Auth::check()) {
		$this->validate($request, [
		            'name' => 'required',
		            'description' => 'required'
		        ]);
		$task = Task::findOrFail($id);
		
		$input = $request->all();
		
		$task->fill($input)->save();
		
		Session::flash('flash_message', 'Task successfully updated!');
		
			return redirect()->back();
					}
		else {
			return redirect()->action('HomeController@index');
		}
	}

	public function updateCard($id, $id2) {
		if(Auth::check()) {
		$task = Task::findOrFail($id);

		$task->card_id = $id2;

		$task->save();
				}
		else {
			return redirect()->action('HomeController@index');
		}
	}
	
	public function delete($id) {
		if(Auth::check()) {
		$t = Task::findOrFail($id);
		
		$t->delete();
		
		return redirect()->back();
				}
		else {
			return redirect()->action('HomeController@index');
		}
	}
	
	public function create(Request $request) {
		if(Auth::check()) {
		$user = Auth::user();
		$this->validate($request, [
		            'name' => 'required',
		            'description' => 'required',
					'date_created'      => 'required',
    				'date_ended'        => 'required',
		]);
		//Task::create($task);
		$task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->date_created = $request->date_created;
		$task->date_ended = $request->date_ended;
		// $task->project_id = $request->project_id;
		// $task->card_id = $request->card_id;
        $task->save();
        
        $task->user()->save($user); 
		Session::flash('flash_message', 'Task successfully added!');
		return redirect()->back();
				}
		else {
			return redirect()->action('HomeController@index');
		}
	}
	public function createInProject(Request $request, $id1, $id2) {
		if(Auth::check()) {
		$user = Auth::user();
		$this->validate($request, [
		            'name' => 'required',
		            'description' => 'required',
					'date_created'      => 'required',
    				'date_ended'        => 'required',
		]);
		//Task::create($task);
		$task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->date_created = $request->date_created;
		$task->date_ended = $request->date_ended;
		$task->project_id = $id1;
		$task->card_id = $id2;
        $task->save();
        
        $task->user()->save($user); 
		Session::flash('flash_message', 'Task successfully added!');
		return redirect()->back();
				}
		else {
			return redirect()->action('HomeController@index');
		}
	}
	public function assignUser(Request $request, $id) {
		if(Auth::check()) {
		if($request->assignUser==null)
		    return redirect()->back();
		$this->validate($request, [
		            'assignUser' => 'required'
		]);
		
		$findTask = Task::findOrFail($id);
		$findUser = User::findOrFail($request->assignUser);
		$findTask->user()->save($findUser);
		return redirect()->back();
				}
		else {
			return redirect()->action('HomeController@index');
		}
	}
}
