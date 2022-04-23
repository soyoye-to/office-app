<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Role;

class RoleController extends Controller
{
    //Adding new Role
    public function addRole(Request $request) {
        $addRoles = Role::create([
            'role_name' => $request->roleName,
            'role_description' => $request->roleDesc,
        ]);
      
        if($addRoles) {
            return response([
                'mssg' => 'Role Added Successfully!!!'
            ],200);
        }

        return response([
            'error' => 'Unable to Add new Role !!!'
        ],400);
    }
    //Getting roles to the table
    public function getRole() {
        $roles = Role::all();
        return response([
            'roles' => $roles
        ],200);
    }
    //editing Role
    public function editRole(Request $request) {
        // dd($request);
        $editRole = Role::where('id', $request->id)->first();
        $editRole->role_name = $request->role_name;
        $editRole->role_description = $request->role_description;
        
        if($editRole->save()) {
            return response([
                'mssg' => 'Successfully Edited'
            ], 200);
        }
        return response([
            'error' => 'Unable to Edit'
        ], 409);
    }
    //deleting Role
    public function deleteRoles($id) {
        $deleteRole =  Role::where('id', $id)->delete();
        return response(([
            'Response' => "Role Deleted "
        ]));
    }
    
}
