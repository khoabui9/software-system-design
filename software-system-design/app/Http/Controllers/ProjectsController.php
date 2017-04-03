<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use Session;

class ProjectsController extends Controller
{
    public function show(){
            $projects =  DB::table('projects')->paginate(9);
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
    public function sort() {
        $projects = Project::orderBy('created_at','desc')->paginate(9);
        return view('dashboard.projects')->with('projects', $projects);
    }
}
