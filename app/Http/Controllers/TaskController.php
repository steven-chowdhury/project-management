<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * Display all tasks by project id
     */
    public function indexByProjectId(string $project_id)
    {
        $project = Project::findOrFail($project_id);
        $tasks = Task::where('project_id', $project->id)->get();

        return response()->json($tasks);
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $project_id)
    {
        $project = Project::findOrFail($project_id);

        $validated = $request->validate([
            'title' => 'required|string',
            'description'=> 'string',
            'assigned_to'=> 'string',
            'due_date'=> 'date',
            'status'=> 'string|in:to_do,in_progress,done'
        ]);

        $task = $project->tasks()->create($validated);
        $task->refresh();
        return response()->json($task);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);               
        return response()->json($task);
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
            'status'=> 'string|in:to_do,in_progress,done'
        ]);

        $task = Task::findOrFail($id);
        $task->update($validated);
        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message'=> 'Task deleted successfully']);
    }
}
