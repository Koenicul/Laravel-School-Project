@extends('includes.master')

@section('content')

<div class="px-5">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Task</th>
                <th>Description</th>
                <th>Date</th>
                <th>Category</th>
                <th>Actions</th>
                <th>Completed</th>
            </tr>
        </thead>
        @foreach($tasks as $task)
            <tr>
                <td>{{$task->task}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->date}}</td>
                <td>{{$task->categoryName}}</td>
                <td><a href="{{route('viewTask', $task->id)}}" class="nav-link"><u>View</u></a></td>
                <td>
                    <form method="post" action="{{route('completeTask', $task->id)}}">
                        @csrf

                        <input onChange="this.form.submit()" type="checkbox" id="completed" value="1" name="completed" {{ $task->completed == '1' ? 'checked' : '' }}>
                    
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
<div class="px-5">
    <form method="post" action="{{route('createTask')}}">

        @csrf

            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tr>
                    <td><input type="text" class="form-control" name="task" placeholder="task" value="{{old('task')}}"></td>
                    <td><input type="text" class="form-control" name="description" placeholder="description" value="{{old('description')}}"></td>
                    <td><input type="date" class="form-control" name="date" value="{{old('date')}}"></td>
                    <td>
                        <select name="category" class="form-control">
                            <option value="0">None</option>
                            <option value="1">School</option>
                            <option value="2">House</option>
                            <option value="3">Work</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button type="submit" class="btn btn-primary">Create Task</button></td>
                </tr>
            </table> 
    </form> 

    @if($errors->any())

    <ul>
    @foreach($errors->all() as $error)

        <li>{{$error}}</li>

    @endforeach
    </ul>

    @endif
</div>



@endsection