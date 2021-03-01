@extends('todos.layout')

@section('content')


    <h1 class="text-2xl">Your are Editing Todo </h1>
    <x-alert></x-alert>
    <form action="{{route('todo.update',$todo->id)}}" method="post" class="py-5">
        @csrf
        @method('patch')
        <input type="text" name="title" id="" class="py-2 border" value="{{$todo->title}}">
        <input type="submit" name="" id="" value="Update" class="p-2 border rounded-lg">
    </form>
    <a href="/todos" class="mx-4 px-1 py-1 bg-blue-300 rounded cursor-pointer text-white">Back</a>
@endsection
