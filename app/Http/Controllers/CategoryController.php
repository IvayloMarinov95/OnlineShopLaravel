<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    public function getCategoryIndex(){
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.shop.categories', ['categories' => $categories]);
    }

    public function postCreateCategory(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:categories'
        ]);

        $category = new Category();
        $category->name = $request['name'];
        $category->save();
        return redirect()->back();
    }

    public function getUpdateCategory($category_id){
        $category = Category::find($category_id);
        return view('admin.shop.edit_category', ['category' => $category]);
    }

    public function postUpdateCategory(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);
        $category = Category::find($request['category_id']);
        $category->name = $request['name'];
        $category->update();
        return redirect()->route('admin.shop.categories');
    }

    public function getDeleteCategory($category_id){
        $category = Category::find($category_id);
        $category->delete();
        return redirect()->back();
    }
}
