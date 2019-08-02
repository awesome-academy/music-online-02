<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Repositories\Category\CategoryRepositoryInterface;

use App\Category;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function listCategory()
    {
    	$categories = $this->categoryRepository->getAll();

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
        $categories = $this->categoryRepository->find($id);
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
    	$category = $this->categoryRepository->find($id);
        if ($category == null) {
            return redirect()->route('categories')->with('err', '');
        } else {
            $this->categoryRepository->deleteCategory($id);

            return redirect()->route('categories')->with('success', '');
        }
    	
    	return redirect()->route('categories');
    }
}
