<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\UserProject;


use Session;

class ProjectsController extends Controller
{
    public function show(){
            $projects =  DB::table('projects')->paginate(9);
            return view('dashboard.projects')->with('projects', $projects);
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
        return view('show.project')->withProject($project)
        ->with('users', $users)
        ->with('restUsers', $restUsers);
    }
        public function showEdit($id) {
        $project = Project::findOrFail($id);
        $users = DB::table('user_project')
        ->where('project_id', '=', $id)
        ->join('users', 'users.id', '=', 'user_id')
        ->select('users.*')
        ->get();
        return view('show.projectEdit')->withProject($project)
        ->with('users', $users);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:projects',
            'description' => 'required'
        ]);

        $project = $request->all();

        Project::create($project);

        Session::flash('flash_message', 'Project successfully added!');
        return redirect()->action('ProjectsController@show');
    }
        public function update(Request $request, $id) {
        $p = Project::findOrFail($id);
        $input = $request->all();
        $p->fill($input)->save();
        Session::flash('flash_message', 'Project successfully updated!');
        return redirect('/project/'.$id);
    }
    public function delete($id) {
        $p = Project::findOrFail($id);

        $p->delete();

        return redirect()->action('ProjectsController@show');
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
        $projects = Project::orderBy('created_at','desc')->paginate(9);
        return view('dashboard.projects')->with('projects', $projects);
    }
}
