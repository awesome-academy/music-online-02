<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;

use App\Role;

class UserController extends Controller
{
     public function listUser()
    {
    	$users = User::select('roles.name as role_name', 'roles.id as this_id', 'users.id', 'users.name', 'users.role_id')
    		->join('roles', 'users.role_id', '=', 'roles.id')
    		->orderBy('users.id', 'DESC')
    		->groupBy('users.id', 'roles.name', 'roles.id', 'users.name', 'users.role_id')
    		->get();

    	$roles = Role::get();

    	return view('admin.user.listUser', compact('users', 'roles'));
    }

    public function addViewUser()
    {
    	return view('admin.user.addUser');
    }	

    public function addProcessUser(Request $request)
    {
    	$users = new User();
    	$users->name = $request->nameUser;
    	$users->save();

    	return redirect()->route('users');
    }

    public function updateViewUser($id)
    {
    	$users = User::findorFail($id);

    	return view('admin.user.updateUser', compact('users'));
    }

    public function updateProcessUser(Request $request, $id)
    {
    	$users = new User();
    	$name = $users->name = $request->nameUser;
    	$users = User::where('id', $id)->update(['name' => $name]);

    	return redirect()->route('users');
    }
    
    public function deleteUser($id)
    {
        $users = User::findorFail($id);
        if ($users->role_id == 1) {
            return redirect()->route('users')->with('fail', '....');
        } else { 
            User::where('id', $id)->delete();

            return redirect()->route('users')->with('success', '.....');
        }
    	
    }

    public function changeRole(Request $request, $id)
    {
    	$users = new User();
    	$role_id = $users->role_id = $request->role;
    	$users = User::where('id', $id)->update(['role_id' => $role_id]);

    	return redirect()->route('users');
    }
}
