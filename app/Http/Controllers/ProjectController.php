<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description'=> 'string',
            'assigned_to'=> 'string',
            'due_date'=> 'date',
            'status'=> 'string|in:open,in_progress,completed'
        ]);

        $project = Project::create($validated);
        $project->refresh();
        
        return response()->json($project, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'string',
            'description'=> 'string',
            'assigned_to'=> 'string',
            'due_date'=> 'date',
            'status'=> 'string|in:open,in_progress,completed'
        ]);

        $project = Project::findOrFail($id);
        $project->update($validated);
        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json(['message'=> 'Project deleted successfully']);
    }
}
