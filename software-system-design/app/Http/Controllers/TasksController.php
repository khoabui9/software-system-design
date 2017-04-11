<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Session;

class TasksController extends Controller
{
	public function show(){
		$tasks = Task::all();
		return view('dashboard.tasks')->with('tasks', $tasks);
	}
	
	public function showOne($id) {
		$task = Task::findOrFail($id);
		
		//r		eturn view('show.project')->withProject($project);
	}
	public function update($id, Request $request)
	    {
		$this->validate($request, [
		            'name' => 'required|unique:tasks',
		            'description' => 'required'
		        ]);
		$task = Task::findOrFail($id);
		
		$input = $request->all();
		
		$task->fill($input)->save();
		
		Session::flash('flash_message', 'Task successfully updated!');
		
		return redirect()->action('TasksController@show');
	}
	
	public function delete($id) {
		$t = Task::findOrFail($id);
		
		$t->delete();
		
		return redirect()->action('TasksController@show');
	}
	
	public function create(Request $request) {
		$this->validate($request, [
		            'name' => 'required|unique:tasks',
		            'description' => 'required'
		        ]);
		
		$task = $request->all();
		
		Task::create($task);
		
		Session::flash('flash_message', 'Task successfully added!');
		return redirect()->back();
	}
}
