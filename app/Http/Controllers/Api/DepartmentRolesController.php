<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department_Roles;

class DepartmentRolesController extends Controller
{
    public function index() 
    {
        $roles = Department_Roles::all();

        return response()->json([
            'status'=> true,
            'data' => $roles
        ]);
    }

    public function store(Request $request) 
    {
        $roles = Department_Roles::create([
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

    public function delete(Department_Roles $roles)
    {
        $roles->delete();
        return response()->json([
            'message' => 'Roles deleted'
        ]);
    }

    public function list(Department_Roles $roles)
    {
        $roles = Department_Roles::all();

        return response()->json([
            'data' => $roles
        ]);
    }
}
