@extends('includes.master')

@section('content')
<div class="container p-5">
    <form method="post" action="{{route('editEmployee',$employee->employee_id)}}">

    @csrf

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tr>
                <td><input type="text" class="form-control" name="first_name" placeholder="first_name" value="{{$employee->first_name}}"></td>
                <td><input type="text" class="form-control" name="last_name" placeholder="last_name" value="{{$employee->last_name}}"></td>
                <td>
                    <select name="department_id" class="form-control">
                        <option value="{{$employee->department_id}}" hidden>{{$employee->department_name}}</option>
                        <option value="0">None</option>
                        <option value="110">Accounting</option>
                        <option value="10">Administration</option>
                        <option value="90">Executive</option>
                        <option value="60">IT</option>
                        <option value="20">Marketing</option>
                        <option value="80">Sales</option>
                        <option value="50">Shipping</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="action" value="home" class="btn btn-primary">Save and Exit</button></td>
                <td><button type="submit" name="action" value="back" class="btn btn-primary">Save</button></td>
                <td>
                    <a href="{{ url('/') }}" class="btn btn-danger">Back</a>
                </td>
            </tr>
        </table>
    </form>
    

    <form method="post" action="{{route('deleteEmployee', $employee->first_name)}}">
        
        @csrf

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="employeeName" placeholder="Enter First Name">
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