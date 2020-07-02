@extends('layouts.app')

@section('content')
    <?php $isTodo = isset($todo) ?>
    <div class="bg-white border p-3">
        <form method="POST" action="{{$isTodo? route('todo.update', $todo) : route('todo.store', $listTodo)}}">
            @csrf
            @if($isTodo)
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="title" name="title" class="form-control" id="title" placeholder="title" value="{{$todo->title ?? ''}}">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status1" value="1" {{ $isTodo ? ($todo->status == 1 ? 'checked' : '') : 'checked'}}>
                <label class="form-check-label" for="radio">
                    To do
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status2" value="2" {{ $isTodo ? ($todo->status == 2 ? 'checked' : '') : ''}}>
                <label class="form-check-label" for="radio">
                    Doing
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status3" value="3" {{ $isTodo ? ($todo->status == 3 ? 'checked' : '') : ''}}>
                <label class="form-check-label" for="radio">
                    Done
                </label>
            </div>
            <div class="d-flex">
                <a href="{{url()->previous()}}" class="btn btn-danger m-1 ml-auto">Cancel</a>
                <button class="btn btn-success m-1">Create</button>
            </div>

        </form>
    </div>
@endsection
