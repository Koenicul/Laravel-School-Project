<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\employee;
use App\Models\department;

class EmployeeController extends Controller
{
    public function showEmployees(){
        $employees = DB::table('employees')
            ->leftJoin('departments', 'employees.department_id', '=', 'departments.department_id')
            ->orderBy('employee_id', 'ASC')
            ->get();

        return view('home', compact('employees'));
    }

    public function orderedEmployees(Request $request){
        switch ($request->input('action')) {
            case 'first_name':
                $test = 'first_name';
                break;
            case 'last_name':
                $test = 'last_name';
                break;
            case 'department_name':
                $test = 'department_name';
                break;
            }

        $employees = DB::table('employees')
            ->leftJoin('departments', 'employees.department_id', '=', 'departments.department_id')
            ->orderBy($test, 'ASC')
            ->get();
        
        return view('home', compact('employees'));
    }

    public function saveEmployee(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'department_id' => 'required|int'
        ]);

        $employee = new employee;
        
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->department_id = $request->department_id;
        $employee->save();

        return redirect()->back();
    }

    public function viewEmployee($employee_id){
        $employee = DB::table('employees')
            ->where('employee_id', $employee_id)
            ->leftJoin('departments', 'employees.department_id', '=', 'departments.department_id')
            ->first();

        return view('viewemployee', compact('employee'));
    }

    public function editEmployee(Request $request, $employee_id){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'department_id' => 'required|int',
        ]);

        $employee = employee::where('employee_id', $employee_id)->first();
        
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->department_id = $request->department_id;
        $employee->save();
        
        switch ($request->input('action')) {
            case 'home':
                return redirect('/');
                break;
    
            case 'back':
                return redirect()->back();
                break;
            }
    }

    public function deleteEmployee(Request $request, $employee_name){
        $request->validate([
            'employeeName' => 'required'
        ]);

        if ($employee_name == $request->employeeName){
            
            $employee = DB::table('employees')
                ->where('first_name', $employee_name);
            $employeeM = $employee->first();

            $employee->delete();

            return redirect('/');           
        }

        return redirect()->back()->with('danger','Employee Name Is Invalid');
    }

    public function searchEmployee(Request $request){
        $employees = DB::table('employees')
            ->where('first_name', $request->search)
            ->leftJoin('departments', 'employees.department_id', '=', 'departments.department_id')
            ->get();
        
        return view('search', compact('employees'));
    }
}
