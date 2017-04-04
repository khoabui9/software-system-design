@extends('layouts.main')

@section('content')
        <h2 class="project-list">Projects</h2>
			<hr>
				<table>
					  <tr>
					    <th>Project</th>
					    <th>Day created</th>
					    <th>Members</th>
					  </tr>
                      @foreach($projects as $project)
                        <tr>
					    <td><a href="/project/{{{$project->id}}}">{{{ $project->name }}}</a></td>
					    <td>{{{ $project->created_at }}}</td>
							 <td>4</td>
					  </tr>
                      @endforeach
                </table>

          <h2 class="project-list">Tasks</h2>
			<hr>
				<table>
					  <tr>
					    <th>Tasks</th>
					    <th>Day created</th>
					    <th>Deadline</th>
					  </tr>
                      @foreach($tasks as $task)
                        <tr>
					    <td><a href="#">{{{ $task->name }}}</a></td>
					    <td>{{{ $task->date_created }}}</td>
					    <td class="danger">{{{ $task->date_ended }}}</td>
					  </tr>
                      @endforeach
                </table>

@stop