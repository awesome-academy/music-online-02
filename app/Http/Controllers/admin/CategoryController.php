<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Category; 

class CategoryController extends Controller
{
    public function listCategory()
    {
    	$categories=Category::orderBy('id','ASC')->get();
<<<<<<< HEAD

    	return view('admin.category.listCategory',compact('categories'));
    }

=======
    	return view('admin.category.listCategory',compact('categories'));
    }
>>>>>>> d122f77fbc7cdef5dcba7f48b715a0e0f5f528ca
    public function addViewCategory()
    {
    	return view('admin.category.addCategory');
    }
<<<<<<< HEAD

=======
>>>>>>> d122f77fbc7cdef5dcba7f48b715a0e0f5f528ca
    public function addProcessCategory(Request $request)
    {
    	$categories = new Category();
    	$categories->name =$request->nameCategory;
    	$categories->slug='';
    	$categories->save();
<<<<<<< HEAD

    	return redirect()->route('categories');
    }

    public function updateViewCategory($id)
    {
    	$categories=Category::find($id);

    	return view('admin.category.updateCategory',compact('categories'));
    }

=======
    	return redirect()->route('categories');
    }
    public function updateViewCategory($id)
    {
    	$categories=Category::find($id);
    	return view('admin.category.updateCategory',compact('categories'));
    }
>>>>>>> d122f77fbc7cdef5dcba7f48b715a0e0f5f528ca
    public function updateProcessCategory(Request $request,$id)
    {
    	$categories = new Category();
    	$name=$categories->name=$request->nameCategory;
    	$categories=Category::where('id',$id)->update(['name'=>$name]);
<<<<<<< HEAD

    	return redirect()->route('categories');
    }
    
    public function deleteCategory($id)
    {
    	Category::where('id',$id)->delete();

=======
    	return redirect()->route('categories');
    }
    public function deleteCategory($id)
    {
    	Category::where('id',$id)->delete();
>>>>>>> d122f77fbc7cdef5dcba7f48b715a0e0f5f528ca
    	return redirect()->route('categories');
    }
}
