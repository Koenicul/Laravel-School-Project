@extends('includes.master')

@section('content')
<div class="container p-5">
    <form method="post" action="{{route('editTask',$task->id)}}">

    @csrf

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tr>
                <td><input type="text" class="form-control" name="task" placeholder="task" value="{{$task->task}}"></td>
                <td><input type="text" class="form-control" name="description" placeholder="description" value="{{$task->description}}"></td>
                <td>
                    <select name="category" class="form-control">
                        <option value="{{$task->category}}" hidden>{{$task->categoryName}}</option>
                        <option value="0">None</option>
                        <option value="1">School</option>
                        <option value="2">House</option>
                        <option value="3">Work</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="action" value="home" class="btn btn-primary">Save and Exit</button></td>
                <td><button type="submit" name="action" value="back" class="btn btn-primary">Save</button></td>
                <td>
                    <a href="{{ url('/todo') }}" class="btn btn-danger">Back</a>
                </td>
            </tr>
        </table>
    </form>
    

    <form method="post" action="{{route('deleteTask', $task->task)}}">
        
        @csrf

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="task" placeholder="Enter Task">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>  
        </div>
    </form>
</div


@if($errors->any())

    <ul>
    @foreach($errors->all() as $error)

        <li>{{$error}}</li>

    @endforeach
    </ul>

@endif

@if(session()->has('danger'))
    
    {{session()->get('danger')}}

@endif

@endsection