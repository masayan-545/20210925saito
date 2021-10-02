<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Todolist;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todolist::all();
        return view('index')->with('todos',$todos);
    }
}
