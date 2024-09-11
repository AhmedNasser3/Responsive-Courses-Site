<?php

namespace App\Http\Controllers\Admin\SubSubCategory;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\CoursesVisible;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class SubSubCategoryController extends Controller
{
    public function home($subcategory, $user_Id){
        $visible_courses = CoursesVisible::where('sub_id', $subcategory)->where('users_id', $user_Id)->get();

        return view('FrontEnd.sub_subcategory.index',compact('visible_courses'));
    }
    public function index(){
        $sub_subcategory = SubSubCategory::all();
        return view('Admin.sub_subcategory.index', compact('sub_subcategory'));
    }


    public function create(){
        $subcategory = SubCategory::all();
        return view('Admin.sub_subcategory.create', compact('subcategory'));
    }


    public function store(Request $request){


        $request->validate([
            'sub_categories_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'sub_subcategories_slug' => strtolower(str_replace(' ', '-',$request->title)),
        ]);

        SubSubCategory::insert([
            'sub_categories_id' => $request->sub_categories_id,
            'title' => $request->title,
            'description' => $request->description,
            'sub_subcategories_slug' => strtolower(str_replace(' ', '-',$request->title)),
            ]);


        $subSubCategory = $data_id = SubSubCategory::latest('id')->first()->id;
        if ($subSubCategory) {

        $users = User::all();
        $insertData = [];

        foreach ($users as $user) {
        $insertData[] = [
            'courses_id' => $subSubCategory,
            'users_id' => $user->id,
            'sub_id' =>  $request->sub_categories_id,
            'is_visible' => 0,
        ];
        }

        CoursesVisible::insert($insertData);

        }
           return redirect()->route('sub_subcategory.index');
    }


    public function edit(SubSubCategoryController $sub_subcategory){
        return view('Admin.sub_subcategory.edit', compact('sub_subcategory'));

    }
    public function update(Request $request){
        $sub_subcategory_id = $request->id;

        SubSubCategory::findOrFail($sub_subcategory_id)->update([
           'sub_categories_id' => $request->sub_categories_id,
            'title' => $request->title,
            'description' => $request->description,
            'sub_subcategories_slug' => strtolower(str_replace(' ', '-',$request->title)),

       ]);

       return redirect()->route('admin.sub_subcategory.index');

    }
    public function delete($id){
        SubSubCategory::findOrFail($id)->delete();

        return redirect()->route('sub_subcategory.index');
    }
}
