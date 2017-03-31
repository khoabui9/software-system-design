<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Session;

class ProjectsController extends Controller
{
    public function show(){
            $projects = Project::all();
            return view('dashboard.projects')->with('projects', $projects);
    }

    public function showOne($id) {
        $project = Project::findOrFail($id);

        return view('show.project')->withProject($project);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:projects',
            'description' => 'required'
        ]);

        $project = $request->all();

        Project::create($project);

        Session::flash('flash_message', 'Task successfully added!');
        return redirect()->action('ProjectsController@show');
    }
    public function delete($id) {
        $p = Project::findOrFail($id);

        $p->delete();

        return redirect()->action('ProjectsController@show');
    }
    public function update() {

    }
}
