@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        @media (min-width: 576px) {
            .col-todos{
                width: 30%;
            }
        }
        .dropdown{
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }
        strong{
            color: #111111;
        }
        .todo{
            margin: 5px;
            border-radius: 2px;
        }
        .containerTodos{
            align-items: flex-start;
        }
    </style>
    <?php
        $todos = $listTodo->todosByStatus();
    ?>
    <div class="d-flex">
        <form id="deleteList" action="{{route('listTodo.destroy', $listTodo)}}" class="btn btn-danger ml-auto" onclick="$('#deleteList').submit()" method="POST">@csrf @method('DELETE')Delete List</form>
    </div>
    <div class="d-sm-flex flex-wrap containerTodos">
        <div class="card my-3 py-2 bg-light rounded shadow-sm m-2 col-todos">
            <h6 class="p-3 mb-0"><strong>To do</strong></h6>
            <ul id="1" class="bg-light-primary p-0 pt-2 border-bottom border-dark border-top droppable">
                @foreach($todos[0] as $todo)
                    <li id="{{$todo->id}}" class="media text-muted m-1 bg-light todo">
                        <p class="media-body text-center m-0 p-1">
                            <strong class="d-block text-gray-dark" style="font-size: 15px">{{$todo->title}}</strong>
                        </p>
                        <button class="btn dropdown ml-auto p-0">
                            <a class="dropdown-toggle p-3" id="dropdownBeing{{$loop->index}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownBeing{{$loop->index}}">
                                <form id="delete0{{$loop->index}}" action="{{route('todo.destroy', $todo)}}" class="dropdown-item" onclick="$('#delete0{{$loop->index}}').submit()" method="POST">@csrf @method('DELETE')Delete</form>
                                <a class="dropdown-item" href="{{route('todo.edit', $todo)}}">Update</a>
                            </div>
                        </button>
                    </li>
                @endforeach
            </ul>
            <form id="addTodo0" method="POST" action="{{route('todo.create', $listTodo)}}" class="text-muted mt-1 ml-1" onclick="$('#addTodo0').submit()">@csrf + add</form>
        </div>
        <div class="card my-3 py-2 bg-light rounded shadow-sm m-2 col-todos">
            <h6 class="p-3 mb-0"><strong>Doing</strong></h6>
            <ul id="2" class="bg-light-warning p-0 pt-2 border-bottom border-dark border-top droppable">
                @foreach($todos[1] as $todo)
                    <li id="{{$todo->id}}" class="media text-muted m-1 bg-light todo">
                        <p class="media-body text-center m-0 p-1">
                            <strong class="d-block text-gray-dark" style="font-size: 15px">{{$todo->title}}</strong>
                        </p>
                        <button class="btn dropdown ml-auto p-0">
                            <a class="dropdown-toggle p-3" id="dropdownBeing{{$loop->index}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownBeing{{$loop->index}}">
                                <form id="delete1{{$loop->index}}" action="{{route('todo.destroy', $todo)}}" class="dropdown-item" onclick="$('#delete1{{$loop->index}}').submit()" method="POST">@csrf @method('DELETE')Delete</form>
                                <a class="dropdown-item" href="{{route('todo.edit', $todo)}}">Update</a>
                            </div>
                        </button>
                    </li>
                @endforeach
            </ul>
            <form id="addTodo1" method="POST" action="{{route('todo.create', $listTodo)}}" class="text-muted mt-1 ml-1" onclick="$('#addTodo1').submit()">@csrf + add</form>
        </div>
        <div class="card my-3 py-2 bg-light rounded shadow-sm m-2 col-todos">
            <h6 class="p-3 mb-0"><strong>Done</strong></h6>
            <ul id="3" class="bg-light-success p-0 pt-2 border-bottom border-dark border-top droppable">
                @foreach($todos[2] as $todo)
                    <li id="{{$todo->id}}" class="media text-muted m-1 bg-light todo">
                        <p class="media-body text-center m-0 p-1">
                            <strong class="d-block text-gray-dark" style="font-size: 15px">{{$todo->title}}</strong>
                        </p>
                        <button class="btn dropdown ml-auto p-0">
                            <a class="dropdown-toggle p-3" id="dropdownBeing{{$loop->index}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownBeing{{$loop->index}}">
                                <form id="delete2{{$loop->index}}" action="{{route('todo.destroy', $todo)}}" class="dropdown-item" onclick="$('#delete2{{$loop->index}}').submit()" method="POST">@csrf @method('DELETE')Delete</form>
                                <a class="dropdown-item" href="{{route('todo.edit', $todo)}}">Update</a>
                            </div>
                        </button>
                    </li>
                @endforeach
            </ul>
            <form id="addTodo2" method="POST" action="{{route('todo.create', $listTodo)}}" class="text-muted mt-1 ml-1" onclick="$('#addTodo2').submit()">@csrf + add</form>
        </div>
    </div>
    <script>
        $('.droppable').sortable({
            connectWith: '.droppable',
            receive: (ev, ui)=>{
                let status = ev.target.id;
                let todoId = ui.item[0].id;
                let url = `http://bestproject/todo/statusUpdate/${todoId}/${status}`;
                $.ajax({
                    url: url,
                    method: 'GET',
                    error: () => {
                        console.log('Pizdec')
                    },
                    success: () => {
                        console.log('NICE')
                    }
                });
            }
        });

    </script>
@endsection
