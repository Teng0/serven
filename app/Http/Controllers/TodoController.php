<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateQequest;
use App\Models\Todo;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
}

    public function index()
    {
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        return view('/todos/index',compact('todos'));
    }

    public function create()
    {
        return view('/todos/create');
    }
    public function edit(Todo $todo)
    {

        //$todo=Todo::find($id);
        //dd($todo->title);
        //return $todo;

        return view('/todos/edit',compact('todo'));
    }

    public function store(TodoCreateQequest $request){


        auth()->user()->todos()->create($request->all());

        //Todo::create($request->all());
        return redirect()->back()->with('message','Todo Created Succesfully');

    }
    public function update(TodoCreateQequest $request,Todo $todo){
        $todo->update(['title'=>$request->title]);
       return redirect(route('todo.index'))->with('message','Todo Updared succesfuly');

    }

    public function complate(Todo $todo){

        $todo->update(['completed'=>true]);
        return redirect(route('todo.index'))->with('message',"Todo Marked as Complated");
    }
    public function incomplate(Todo $todo){
        $todo->update(['completed'=>false]);
        return redirect(route('todo.index'))->with('message','Todo Updared succesfuly');

    }
    public function delete(Todo $todo){
        $todo->delete();
        return redirect(route('todo.index'))->with('message','Todo Deleted succesfuly');

    }
}
