@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/main.js') }}"></script>
    <div class="d-flex">
        <div class="d-flex ml-auto flex-row">
            <form id="form-create" style="display: none;" action="{{route('listTodo.store')}}" method="POST">
                @csrf
                <input name="title" class="form-control">
            </form>
            <button class="btn btn-danger" id="btn-back" style="display: none;">Back</button>
            <button class="btn btn-success" id="btn-create">Create</button>

        </div>

    </div>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Lists Todo</h6>
        @foreach(auth()->user()->listTodo()->getResults() as $list)
            <a href="{{route('listTodo.show', $list)}}">
                <div class="media text-muted pt-3">
                    <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark" style="font-size: 18px">{{$list->title}}</strong>
                    </p>
                </div>
            </a>
        @endforeach
    </div>

@endsection
