<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskSecController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks_view.index',['tasks' => Task::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks_view.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate($request->all());
        $request->validate([
            'title'=> 'string | max:255|required',
            'description'=> 'string | max:10000|required'
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status == "on" ? 1 : 0
        ]);

        return redirect()->route('index')->with('success', 'Tache enregistre avec succes');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $task = Task::where('id', $id)->first();

        return view('tasks_view.create', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // $request->validated($request->all());
        $request->validate([
            'title'=> 'string | max:255|required',
            'description'=> 'string | max:1000|required'
        ]);
        $task = Task::where('id', $id)->first();
        $task->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status == 'on'? 1: 0
        ]);

        return redirect()->route('index')->with('success', 'Tache modifiee avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $task = Task::where('id', $id)->delete();
        return redirect()->route('index')->with('success', 'tache supprimee avec succes');
    }
}
