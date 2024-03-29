<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepartmentRole;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\DepartmentRolesResource;

class DepartmentRolesController extends Controller
{
    public function index() 
    {
        $roles = DepartmentRole::with('departments')->get();

        return response()->json([
            'status'=> true,
            'data' => $roles
        ]);
    }

    public function store(Request $request) 
    {
        $roles = DepartmentRole::create([
            'department_id'=>$request->department_id,
            'name'=>$request->role,
            'description'=>$request->description,
        ]);

        return response()->json([
            'data' => $roles,
            'status' => true,
            'message' => 'Successfully create roles',
        ]);
    }

    public function delete(DepartmentRole $roles)
    {
        $roles->delete();
        return response()->json([
            'message' => 'Roles deleted'
        ]);
    }

    public function show(DepartmentRole $role)
    {
        return response()->json([
            'data' => $role
        ]);
    }

    public function selectRole() 
    {   
        $department_id = request('department_id');

        $roles = DepartmentRole::where('department_id', $department_id)->get();

        // $roles = collect(['id','name'])->toArray();

        // return $roles->toArray();

        return DepartmentRolesResource::collection($roles);


    }
}
