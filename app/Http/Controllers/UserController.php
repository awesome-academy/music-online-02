<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Playlist;

class UserController extends Controller
{
    public function updateProfile($id,Request $request)
    {
        $users = new User();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileName = $file->getClientOriginalName('image');
            $path = 'image';
            $file->move($path, $fileName);
            $realFileName = 'image/' . $fileName;
            User::where('id', $id)->update(['image' => $realFileName]);
            $ava = User::find($id);
            session()->put('avatar', $ava->image);
        } else { 
            $name = $users->name = $request->name;
            $email = $users->email = $request->email;
            User::where('id', $id)->update(['name' => $name, 'email' => $email]);
        }
        
    	return redirect()->route('profile.view', [$id]);
    }

}
