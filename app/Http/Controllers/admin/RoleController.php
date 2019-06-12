<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Role;

class RoleController extends Controller
{
    public function listRole()
    {
    	$roles = Role::orderBy('id', 'ASC')->get();

    	return view('admin.role.listRole', compact('roles'));
    }

    public function addViewRole()
    {
    	return view('admin.role.addRole');
    }

    public function addProcessRole(Request $request)
    {
    	$roles = new Role();
    	$roles->name = $request->nameRole;
    	$roles->save();

    	return redirect()->route('roles');
    }

    public function updateViewRole($id)
    {
    	$roles = Role::findOrFail($id);

    	return view('admin.role.updateRole', compact('roles'));
    }

    public function updateProcessRole(Request $request, $id)
    {
    	$roles = new Role();
    	$name = $roles->name = $request->nameRole;
    	$roles = Role::where('id', $id)->update(['name' => $name]);

    	return redirect()->route('roles');
    }
    
    public function deleteRole($id)
    {
    	Role::where('id', $id)->delete();

    	return redirect()->route('roles');
    }
}
