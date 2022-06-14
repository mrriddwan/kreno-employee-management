<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends Controller
{
    public function index() 
    {
        return EmployeeResource::collection(Employee::all());
    }

    public function store(Request $request) 
    {
        $employee = Employee::create([
            'name'=>$request->name,
            'address'=>$request->address,
            'email'=>$request->email,
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
            'message' => 'Successfully fetch data employee '. $employee->name,

            'data' => $employee,
        ]);
    }

    public function update(Request $request, Employee $employee) 
    {
        $employee->update([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch data employee '.$employee->name,
            'data' => $employee,
        ]);
    }

    public function delete(Employee $employee) 
    {
        $employee -> delete();
        return response() -> json('Employee deleted.');
    }

    public function uploadPhoto(Request $request)
    {

    }
}
