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

    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Todolist::$rules);
        $form = $request->all();
        unset($form["_token"]);
        Todolist::create($form);
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $todolist = Todolist::find($request->content);
        return view('edit', ['form' => $todolist]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Todolist::$rules);
        $form = $request->all();
        unset($form['_token']);
        Todolist::where('content', $request->content)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $todolist = Todolist::find($request->content);
        return view('delete', ['form' => $todolist]);
    }

    public function remove(Request $request)
    {
        Todolist::find($request->content)->delete();
        return redirect('/');
    }
}
