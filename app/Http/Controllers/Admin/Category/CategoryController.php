<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;

class CategoryController extends Controller
{
    public function CategoryView(){
        $category = Category::all();
        return view('Admin.Category.category', compact('category'));
    }


    public function CategoryCreate(){
        $category = Category::latest()->get();
        return view('Admin.Category.category_create', compact('category'));
    }


    public function CategoryStore(Request $request){


        $request->validate([
             'category_title' => 'required',
             'category_description' => 'required',
         ]);


        $image = $request->file('category_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
        Image::read($image)->resize(1000,1000)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;



        Category::insert([
         'category_title' => $request->category_title,
         'category_description' => $request->category_description,
         'category_slug' => strtolower(str_replace(' ', '-',$request->category_title)),
         'category_img' => $save_url,
         'created_at' => Carbon::now(),
         ]);
         return redirect(route('category.index'));
     }
     public function CategoryEdit($id){
         $category = Category::findOrFail($id);
         return view('Admin.Category.category_edit',compact('category'));

     }

     public function CategoryUpdate(Request $request ){
        $Category_id = $request->id;

        if ($request->file('category_img')) {

            $image = $request->file('category_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::read($image)->resize(1000,1000)->save('upload/category/'.$name_gen);
            $save_url = 'upload/category/'.$name_gen;


            Category::findOrFail($Category_id)->update([
                'category_title' => $request->category_title,
                'category_description' => $request->category_description,
                'category_slug' => strtolower(str_replace(' ', '-',$request->category_slug)),
                'category_img' => $save_url,

            ]);
        } else{

            Category::findOrFail($Category_id)->update([
                'category_title' => $request->category_title,
                'category_description' => $request->category_description,
                'category_slug' => strtolower(str_replace(' ', '-',$request->category_slug)),
            ]);

        return redirect()->route('category.index');

    }
}






     public function CategoryDelete($id){

         Category::findOrFail($id)->delete();

         $notification = array(
             'message' => 'Category Deleted Successfully',
             'alert-type' => 'success'
         );

         return redirect()->back()->with($notification);

     }
}
