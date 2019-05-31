<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    public function listCategory()
    {
    	$categories = Category::orderBy('id', 'ASC')->get();

    	return view('admin.category.listCategory', compact('categories'));
    }

    public function addViewCategory()
    {
    	return view('admin.category.addCategory');

    }

    public function addProcessCategory(Request $request)
    {
    	$categories = new Category();
    	$categories->name = $request->nameCategory;
    	$categories->slug = '';
    	$categories->save();

    	return redirect()->route('categories');
    }

    public function updateViewCategory($id)
    {
        $categories = Category::find($id);
        if ($categories == null) {
            return redirect()->route('categories')->with('errId');      
        } else {
            return view('admin.category.updateCategory', compact('categories'));   
        }
    }

    public function updateProcessCategory(Request $request, $id)
    {
    	$categories = new Category();
    	$name = $categories->name = $request->nameCategory;
    	$categories = Category::where('id', $id)->update(['name' => $name]);
        
    	return redirect()->route('categories');
    }
    
    public function deleteCategory($id)
    {
    	Category::where('id', $id)->delete();
    	
    	return redirect()->route('categories');
    }
}
