<?php

namespace App\Http\Controllers\Admin\SubCategory;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\CoursesVisible;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{

    public function index ($category,$subcategory){
        $subcategories = SubCategory::where('category_id', $category)->get();
        return view('FrontEnd.SubCategory.index',compact('subcategories','subcategory'));
    }





    public function SubCategoryView(){
        $categories = Category::orderBy('category_title','ASC')->get();
    	$subcategory = SubCategory::latest()->get();
    	return view('Admin.SubCategory.index',compact('subcategory','categories'));
    }




    public function SubCategoryCreate(){
        $categories = Category::orderBy('category_title','ASC')->get();
    	$subcategory = SubCategory::latest()->get();
    	return view('Admin.SubCategory.create',compact('subcategory','categories'));
    }




    public function SubCategoryStore(Request $request){

        $request->validate([
             'category_id' => 'required',
             'subcategory_title' => 'required',
             'subcategory_description' => 'required',
         ],[
             'category_id.required' => 'Please select Any option',
             'subcategory_title.required' => 'Input SubCategory English Name',
         ]);



        SubCategory::insert([
         'category_id' => $request->category_id,
         'subcategory_title' => $request->subcategory_title,
         'subcategory_description' => $request->subcategory_description,
         'subcategory_img' => $request->subcategory_img,
         'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_title)),
         ]);


         return redirect()->route('subcategory.index');

     } // end method




     public function SubCategoryEdit(SubCategory $subcategory, Category $categories){
        $categories = Category::orderBy('category_title','ASC')->get();
        return view('Admin.SubCategory.edit',compact('subcategory','categories'));
     }



    public function SubCategoryUpdate(Request $request){
    	$subcat_id = $request->id;

    	 SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_title' => $request->subcategory_title,
            'subcategory_description' => $request->subcategory_description,
            'subcategory_img' => $request->subcategory_img,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_title)),

    	]);
        return redirect()->route('subcategory.index');

     } // end method




     public function SubCategoryDelete($id){
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return redirect()->route('subcategory.index');

     }

}
