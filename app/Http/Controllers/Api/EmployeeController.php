<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Department_Roles;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use App\Models\EmployeeRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class EmployeeController extends Controller
{    
    public function index()
    {
        $employees = Employee::with('department', 'roles')->get();


        return response()->json(['data' => $employees]);
    }


    public function store(Request $request)
    {
        $employee = Employee::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        return response()->json([
            'data' => $employee,
            'status' => true,
            'message' => 'Successfully store employee',
        ]);
    }

    public function show(Employee $employee)
    {

        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch data employee ' . $employee->name,
            'data' => $employee,
        ]);
    }

    public function update(Request $request, Employee $employee, EmployeeRole $employeeRole)
    {   

        //TRIAL 3

        $employee->roles()->sync($request['department_role_id']);


        $employee->update([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'department_id' => $request->department_id,
        ]);


        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch data employee ' . $employee->name,
            'data' => $employee,
        ]);
    }

    // public function assignDept(Request $request, Employee $employee)
    // {
    //     $employee->update([
    //         'department_id' => $request->department_id,
    //     ]);

    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Successfully fetch data employee ' . $employee->name,
    //         'data' => $employee,
    //     ]);
    // }

    // public function assignRole(Request $request, EmployeeRole $employeeRole)
    // {

    // }

    public function delete(Employee $employee)
    {
        $employee->delete();
        return response()->json('Employee deleted.');
    }

    public function uploadPhoto(Request $request, Employee $employee)
    {
        $this->validate($request, [
            'employee_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        $filename = $request->employee_photo->getClientOriginalName();
        Storage::disk('public')->put('employee/' . $filename, File::get($request->employee_photo));

        $employee->update([
            'employee_photo' => $filename
        ]);

        return response()->json([
            'message' => 'Successfully upload employee image',
            'data' => $employee
        ]);
    }
}
