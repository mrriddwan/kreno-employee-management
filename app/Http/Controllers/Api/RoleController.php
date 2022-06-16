<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function department()
    {
        ;
    }


    public function index() 
    {
        $roles = Role::all();

        return response()->json([
            'status'=> true,
            'data' => $roles
        ]);
    }

    public function store(Request $request) 
    {
        $roles = Role::create([
            'name'=>$request->name,
            'description'=>$request->address,
        ]);

        return response()->json([
            'data' => $roles,
            'status' => true,
            'message' => 'Successfully create roles',
        ]);
    }

    public function delete(Role $roles)
    {
        $roles->delete();
        return response()->json([
            'message' => 'Roles deleted'
        ]);
    }

}
