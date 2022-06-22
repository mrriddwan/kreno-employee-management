<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Resources\DepartmentResource;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    public function index()
    {
        return DepartmentResource::collection(Department::all());
    }

    public function store(DepartmentRequest $request)
    {
        $department = Department::create($request -> validated());
        return new DepartmentResource($department);
    }

    public function show(Department $department)
    {   
        // $department = Department::all();
        return response()->json([
            'status' => true,
            'data' => $department,
        ]);
        // return new DepartmentResource($department);
    }

    public function update(DepartmentRequest $request,Department $department)
    {
        $department->update($request->validated());
        return new DepartmentResource($department);
    }

    public function uploadPhoto(Request $request, Department $department)
    {
        $this->validate($request,[
            'dept_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        $filename = time() .'_'. $request -> dept_photo -> getClientOriginalName();
        $file_path = $request -> file('dept_photo') -> storeAs('uploads', $filename, 'public');
    

        $department->update([
            'dept_photo' => $filename,
            'dept_photo_path' => '/storage/' . $file_path
        ]);

        return response()->json([
            'message' => 'Successfully upload department image',
            'data' => $department
        ]);
    }

    public function delete(Department $department)
    {
        $department->delete();
        return response()->json([
            'message' => 'Department deleted'
        ]);
    }
}
