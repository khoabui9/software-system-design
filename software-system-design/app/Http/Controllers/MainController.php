<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class MainController extends Controller
{
	public function index(){
		$projects = Project::all();
		$tasks = Task::all();
		return view('dashboard.dashboard')
		            ->with('projects', $projects)
		            ->with('tasks', $tasks);
	}
}
