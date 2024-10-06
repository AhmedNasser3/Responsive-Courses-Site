<?php
namespace App\Http\Controllers\Admin\Category;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;

class CategoryController extends Controller
{
    public function CategoryView() {
        return view('Admin.Category.category', ['category' => Category::all()]);
    }

    public function CategoryCreate() {
        return view('Admin.Category.category_create', ['category' => Category::latest()->get()]);
    }

    public function CategoryStore(Request $request) {
        $request->validate(['category_title' => 'required', 'category_description' => 'required']);
        $image = $request->file('category_img');
        $save_url = 'upload/category/'.hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(1000,1000)->save($save_url);
        Category::create([
            'category_title' => $request->category_title,
            'category_description' => $request->category_description,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_title)),
            'category_img' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        return redirect(route('category.index'));
    }

    public function CategoryEdit($id) {
        return view('Admin.Category.category_edit', ['category' => Category::findOrFail($id)]);
    }

    public function CategoryUpdate(Request $request) {
        $category = Category::findOrFail($request->id);
        $data = [
            'category_title' => $request->category_title,
            'category_description' => $request->category_description,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_slug)),
        ];

        if ($request->hasFile('category_img')) {
            $image = $request->file('category_img');
            $data['category_img'] = 'upload/category/'.hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::read($image)->resize(1000,1000)->save($data['category_img']);
        }

        $category->update($data);
        return redirect()->back();
    }

    public function CategoryDelete($id) {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with(['message' => 'Category Deleted Successfully', 'alert-type' => 'success']);
    }
}
