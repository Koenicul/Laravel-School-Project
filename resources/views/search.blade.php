@extends('includes.master')

@section('content')

<div class="px-5">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->department_name}}</td>
                <td><a href="{{route('viewEmployee', $employee->employee_id)}}" class="nav-link"><u>View</u></a></td>
            </tr>
        @endforeach
            <tr>
                <td><a href="{{ url('/') }}" class="btn btn-danger">Back</a></td>
            </tr>
    </table>
</div>

@endsection