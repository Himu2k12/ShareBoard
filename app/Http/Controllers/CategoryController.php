<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Idea;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
    public function saveCategoryInfo(Request $request) {
        $category = new Category();

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->start_date = $request->start_date;
        $category->end_date = $request->end_date;
        $category->publication_status = $request->publication_status;
        $category->save();

        return redirect('/add-category')->with('message', 'Category info save successfully');
    }
    public function manageCategoryInfo() {
        $allCategories = Category::all();
        $delUsers=DB::select('SELECT * FROM categories Where id NOT IN (Select category_id from ideas)');
        return view('admin.category.manage-category', ['allCategories'=>$allCategories,'delUsers'=>$delUsers]);
    }
    public function unpublishedCategoryInfo($id) {
        $categoryById = Category::find($id);
        $categoryById->publication_status = 0;
        $categoryById->save();
        return redirect('manage-category')->with('message', 'Category info unpublished successfully');
    }
    public function publishedCategoryInfo($id) {
        $categoryById = Category::find($id);
        $categoryById->publication_status = 1;
        $categoryById->save();
        return redirect('manage-category')->with('message', 'Category info published successfully');
    }
    public function editCategoryInfo($id) {
        //$categoryById = Category::where('id', $id)->first();

        $categoryById = Category::find($id);

        return view('admin.category.edit-category', ['categoryById'=>$categoryById]);
    }

    public function updateCategoryInfo(Request $request) {
//        $category = new Category();

        $categoryById = Category::find($request->t);
        $categoryById->category_name = $request->category_name;
        $categoryById->category_description = $request->category_description;
        $categoryById->end_date = $request->end_date;
        $categoryById->publication_status = $request->publication_status;
        $categoryById->save();

        return redirect('/manage-category')->with('message', 'Category info update successfully');
    }
    public function deleteCategoryInfo($id) {
        $categoryById = Category::find($id);
        $categoryById->delete();

        return redirect('/manage-category')->with('message', 'Category info delete successfully');
    }


}
