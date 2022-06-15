<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Resources\DepartmentResource;
use App\Http\Requests\DepartmentRequest;

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
        return new DepartmentResource($department);
    }

    public function update(DepartmentRequest $request,Department $department)
    {
        $department->update($request->validated());
        return new DepartmentResource($department);
    }

    public function uploadImage()
    {

    }

    public function delete(Department $department)
    {
        $department->delete();
        return response()->json([
            'message' => 'Department deleted'
        ]);
    }
}
