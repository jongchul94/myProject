<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return 'Hello, World!';
        // return view('tasks.index')->with('tasks', Task::all());
    }

    // public function store(\Illuminate\Http\Request $request)
    // {
    //     Task::create($request->only(['title', 'description']));

    //     return redirect('tasks');
    // }
}
