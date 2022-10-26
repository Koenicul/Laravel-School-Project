@extends('includes.master')

@section('content')

<div class="px-5">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <form method="post" action="{{route('order')}}">

                    @csrf

                    <th><button class="btn btn-dark" type="submit" name="action" value="first_name">First Name</button></th>
                    <th><button class="btn btn-dark" type="submit" name="action" value="last_name">Last Name</button></th>
                    <th><button class="btn btn-dark" type="submit" name="action" value="department_name">Department</button></th>
                    <th>Actions</th>
                </form>
            </tr>
        </thead>
        @foreach($employees as $employee)
            <tr>
                <td width="30%">{{$employee->first_name}}</td>
                <td width="30%">{{$employee->last_name}}</td>
                <td width="30%">{{$employee->department_name}}</td>
                <td width="10%"><a href="{{route('viewEmployee', $employee->employee_id)}}" class="nav-link"><u>View</u></a></td>
            </tr>
        @endforeach
    </table>
</div>

@include('includes.createEmployee')

@endsection