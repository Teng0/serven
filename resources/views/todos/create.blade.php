@extends('todos.layout')

@section('content')

    <h1 class="text-2xl">What next you need to-Do</h1>
    <x-alert></x-alert>
    <form action="/todos/create" method="post" class="py-5">
        @csrf
        <input type="text" name="title" id="" class="py-2 border">
        <input type="submit" name="" id="" value="create" class="p-2 border rounded-lg">
    </form>
    <a href="/todos" class="mx-4 px-1 py-1 bg-blue-300 rounded cursor-pointer text-white">Back</a>
@endsection
