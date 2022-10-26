<div class="px-5">
    <form method="post" action="{{route('createEmployee')}}">

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
                    <td><input type="text" class="form-control" name="first_name" placeholder="first_name" value="{{old('first_name')}}"></td>
                    <td><input type="text" class="form-control" name="last_name" placeholder="last_name" value="{{old('last_name')}}"></td>
                    <td>
                        <select name="department_id" class="form-control">
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
                    <td><button type="submit" class="btn btn-primary">Create Employee</button></td>
                </tr>
            </table> 
    </form>
</div>

@if($errors->any())

    <ul>
    @foreach($errors->all() as $error)

        <li>{{$error}}</li>

    @endforeach
    </ul>

@endif