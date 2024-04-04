<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::all();
        return view('tasks_view.index', compact('tasks'));
    }
    public function create(): View
    {
        return view('tasks_view.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'string | max:255|required',
            'description'=> 'string | max:1000|required'
        ]);
        // dd($request);
        Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status == 'on'? 1: 0
        ]);
        return redirect()->route('index')->with('success', 'tache enregistree avec succes');
    }
    public function edit(int $id): View
    {
        $task = Task::where('id', $id)->first();

        return view('tasks_view.create', compact('task'));
    }

    public function update(Request $request,int $id )
    {
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
        return redirect()->route('index')->with('success', 'tache modifiee avec succes');
    }
    public function destroy(int $id)
    {
        $task = Task::where('id', $id)->delete();
        return redirect()->route('index')->with('success', 'tache supprimee avec succes');

 
    }
}
