
    @if($todo->completed)
        <a href="" class="mx-4 cursor-pointer text-green-400  cursor-pointer"> <span class="fa fa-check px-5" onclick="event.preventDefault();document.getElementById('form-incomplate-{{$todo->id}}').submit()"></span></a>
        <form action="{{route('todo.incomplate',$todo->id)}}" id="form-incomplate-{{$todo->id}}"  method="post">
            @csrf
            @method('delete')
        </form>
    @else
        <a href="" class="mx-4 cursor-pointer  text-gray-400 cursor-pointer"> <span onclick="event.preventDefault();document.getElementById('form-complate-{{$todo->id}}').submit()" class="fa fa-check px-5" ></span></a>
        <form action="{{route('todo.complate',$todo->id)}}"  method="post" id="form-complate-{{$todo->id}}" name="form-complate-{{$todo->id}}">
            @csrf
            @method('put')
        </form>
    @endif
