<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;


class EmployeeController extends Controller
{
    public function index()
    {
        return EmployeeResource::collection(Employee::all());
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

    public function update(Request $request, Employee $employee)
    {
        $employee->update([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'department_id' => $request->department_id,
            'department_role_id' => $request->department_role_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch data employee ' . $employee->name,
            'data' => $employee,
        ]);
    }

    public function assignDept(Request $request, Employee $employee)
    {
        $employee->update([
            'department_id' => $request->department_id,
            'department_role_id' => $request->department_role_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch data employee ' . $employee->name,
            'data' => $employee,
        ]);
    }

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

        
        // $employee_photo = $employee->photo;

        // $filename = time() . '.' . explode('/', explode(':', substr($request->employee_photo, 0, strpos($request->employee_photo, ';')))[1])[1];
        // Image::make($request->employee_photo)->save(public_path('avatar/employee/') . $filename);
        // $request->merge(['employee_photo' => $filename]);
                // $userPhoto = public_path('avatar/employee/') . $employee_photo;
        // if (file_exists($userPhoto)) {
        //     @unlink($userPhoto);
        // }


        $filename = $request -> employee_photo -> getClientOriginalName();
        Storage::disk('public')->put('employee/'.$filename, File::get($request->employee_photo));
        
        // $filename = str_replace('data:image/jpeg;base64,', '', $request->employee_photo);
        // $filepath->path = '/storage/app/public/' . $request->path;

        // Storage::disk('public')->put($request->path, base64_decode($filename));    



        $employee->update([
            'employee_photo' => $filename
        ]);

        return response()->json([
            'message' => 'Successfully upload employee image',
            'data' => $employee
        ]);
    }
}
