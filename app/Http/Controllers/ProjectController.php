<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::active()->with('user')->paginate();

        //Project::withoutGlobalScope(CreatedScope::class)->get();

        return response()->json($projects);
    }

    public function recent()
    {
        $projects = Project::with('user')->latest()->take(5)->get();

        return response()->json($projects);
    }

    public function show(int $id)
    {
        $project = Project::active()->with('user')->findOrFail($id);

        return response()->json($project);
    }

    public function view(Project $project)
    {
        return response()->json($project);
    }

    public function latest(){
        $project = Project::where('is_active', '=', 1)->orderBy('project_id', 'DESC')->firstOrFail();

        return response()->json($project);
    }

    public function create(ProjectRequest $request)
    {
        $project = Project::create($request->validated());

        return response()->json($project);
    }
}
