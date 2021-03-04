@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b px-4 border-indigo-400">

        <h1 class="text-2xl">All Todos</h1>
        <a href="/todos/create" class="mx-4 px-1 py-1 text-blue-300  cursor-pointer"><span class="fa fa-plus-circle"></span></a>
    </div>
    <x-alert></x-alert>

    <ul>

        @forelse($todos as $todo)

            <li class="flex justify-between my-2">
                <div>
                    @include("todos.completeButton")
                </div>
                @if($todo->completed)

                <p class="py-1 line-through">{{$todo->title}}</p>
                @else
                <p class="py-1 ">{{$todo->title}}</p>
                @endif

                    <div>
                        <a href="{{'/todos/edit/'.$todo->id}}" class="mx-4 cursor-pointer "><span class="fa fa-edit text-yellow-500"></span></a>
                        <span class="fa fa-trash text-red-500 cursor-pointer" onclick="event.preventDefault();if(confirm('Are you Sure Dude?')){
                            document.getElementById('form-delete-{{$todo->id}}').submit()
                            }"></span>

                        <form action="{{route('todo.delete',$todo->id)}}"  method="post" id="form-delete-{{$todo->id}}" name="form-delete-{{$todo->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </div>
            </li>
        @empty
            <p>To Todos Avilable Create One </p>
        @endforelse

    </ul>
@endsection
